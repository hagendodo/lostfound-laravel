<?php

namespace App\Http\Controllers;

use App\Models\ClaimHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ClaimHistoryController extends Controller
{
    public function index()
    {
        $claims = ClaimHistory::all();
        return view('claim_histories.index', compact('claims')); // Assuming you have a view
    }

    public function show($id)
    {
        $claim = ClaimHistory::findOrFail($id);
        return view('claim_histories.show', compact('claim')); // Assuming you have a view
    }

    public function store(Request $request)
    {
        $request->merge(['ip' => $request->ip()]);
        $request->merge(['user_nim' => Auth::user()->nim]);
        
        $validated_request = $request->validate([
            'user_nim' => 'required|string|max:20',
            'founded_item' => 'required|integer|exists:founded_items,id',
            'ip' => 'required|string|max:100',
            'validation_photo_items' => 'nullable|string|max:2048',
        ]);

        ClaimHistory::create($validated_request);
        return redirect()->route('claim_histories.index')->with('success', 'Claim history created successfully!');
    }

    public function update(Request $request, $id)
    {
        $claimHistory = ClaimHistory::findOrFail($id);
        $claimHistory->update($request->all());
        return redirect()->route('claim_histories.show', $id)->with('success', 'Claim history updated successfully!');
    }

    public function destroy($id)
    {
        ClaimHistory::destroy($id);
        return redirect()->route('claim_histories.index')->with('success', 'Claim history deleted successfully!');
    }
}
