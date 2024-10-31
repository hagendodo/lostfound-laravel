<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoundedItemController;
use App\Http\Controllers\SearchHistoryController;
use App\Http\Controllers\ClaimHistoryController;
use App\Http\Middleware\CheckAuth;
use App\Models\ClaimHistory;
use App\Models\FoundedItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([CheckAuth::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Founded Items Routes
    Route::resource('founded-items', FoundedItemController::class);

    // Search Histories Routes
    Route::resource('search-histories', SearchHistoryController::class);

    // Claim Histories Routes
    Route::resource('claim-histories', ClaimHistoryController::class);
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware([CheckAuth::class])->group(function () {
    Route::get('/search', function () {
        return view('services.index');
    })->name('search');
    
    Route::post('/search-found', function (Request $request) {
        $query = FoundedItem::query();
    
        // Filter out items already claimed by the user
        $query->whereDoesntHave('claimHistory', function ($subQuery) use ($request) {
            $subQuery->where('user_nim', Auth::user()->nim)
                     ->where('founded_item', $request->id);
        });
    
        // Filter by name if provided
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        // Filter by found_date
        $oneWeekAgo = Carbon::now()->subWeek();
        $oneMonthAgo = Carbon::now()->subMonth();
    
        if ($request->has('found_date')) {
            // Parse the incoming ISO 8601 formatted date and remove timezone for comparison
            $foundDate = Carbon::parse($request->found_date)->setTimezone(config('app.timezone'));
        
            if ($foundDate->gte($oneWeekAgo)) {
                // Case: found_date within the past week
                $query->whereBetween('found_date', [$oneWeekAgo, Carbon::now()]);
            } elseif ($foundDate->between($oneMonthAgo, $oneWeekAgo)) {
                // Case: found_date is more than one week but within the past month
                $query->whereBetween('found_date', [$oneMonthAgo, Carbon::now()]);
            }
        }        
    
        $foundedItems = $query->get();
        $searchedDate = $request->found_date;
        $searchedKeyword = $request->name;
    
        return view('services.search', compact(['foundedItems', 'searchedDate', 'searchedKeyword']));
    })->name('search_found');
    
    Route::get('/report', function () {
        return view('services.report');
    })->name('report');

    Route::post('/report', function(Request $request){
        $request->merge(['user_nim' => Auth::user()->nim]);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
            'found_date' => 'required|date',
            'location_option' => 'nullable|string|max:1024',
            'user_nim' => 'required|string|max:20',
        ]);

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Create the FoundedItem record with validated data
        FoundedItem::create($validatedData);
        return redirect()->route('thanks')->with('success', 'Barang hilang telah dilaporkan!');
    })->name('report_found');

    Route::get('/thanks', function () {
        return view('services.thanks');
    })->name('thanks');

    Route::get('/please-wait-verification', function () {
        return view('services.wait');
    })->name('please-wait-verification');

    Route::post('/claim_found/{id}', function ($id) {
        return view('services.claim', ['foundedItemId' => $id]);
    })->name('claim_found');

    Route::post('/verification_claim', function(Request $request){
        $request->merge(['ip' => $request->ip()]);
        $request->merge(['user_nim' => Auth::user()->nim]);
        
        $validated_request = $request->validate([
            'user_nim' => 'required|string|max:20',
            'founded_item' => 'required|integer|exists:founded_items,id',
            'ip' => 'required|string|max:100',
            'validation_photo_items' => 'required|file',
        ]);

        // Handle the photo upload
        if ($request->hasFile('validation_photo_items')) {
            $validatedData['validation_photo_items'] = $request->file('validation_photo_items')->store('proofs', 'public');
        }

        ClaimHistory::create($validated_request);
        return redirect()->route('please-wait-verification')->with('success', 'Barang telah diajukan untuk klaim!');
    })->name('verification_claim');

    Route::get('/riwayat', function () {
        $claims = ClaimHistory::with('foundedItem')->where('user_nim', Auth::user()->nim)->get();
        $reports = FoundedItem::where('user_nim', Auth::user()->nim)->get();

        return view('services.history', compact(['claims', 'reports']));
    })->name('history');
});
