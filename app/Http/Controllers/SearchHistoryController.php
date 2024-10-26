<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SearchHistoryController extends Controller
{
    public function index()
    {
        $histories = SearchHistory::all();
        return view('search_histories.index', compact('histories')); // Assuming you have a view
    }

    public function show($id)
    {
        $history = SearchHistory::findOrFail($id);
        return view('search_histories.show', compact('history')); // Assuming you have a view
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_nim' => 'required|string|max:20',
            'lost_item_name' => 'required|string|max:255',
            'lost_date' => 'required|date',
            'lost_location_option' => 'nullable|string|max:1024',
            'lost_location_coordinate' => 'nullable|point',
        ]);

        SearchHistory::create($request->all());
        return redirect()->route('search_histories.index')->with('success', 'Search history created successfully!');
    }

    public function update(Request $request, $id)
    {
        $searchHistory = SearchHistory::findOrFail($id);
        $searchHistory->update($request->all());
        return redirect()->route('search_histories.show', $id)->with('success', 'Search history updated successfully!');
    }

    public function destroy($id)
    {
        SearchHistory::destroy($id);
        return redirect()->route('search_histories.index')->with('success', 'Search history deleted successfully!');
    }
}
