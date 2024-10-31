<?php

namespace App\Http\Controllers;

use App\Models\FoundedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FoundedItemController extends Controller
{
    public function index()
    {
        $items = FoundedItem::all();
        return view('founded_items.index', compact('items')); // Assuming you have a view
    }

    public function show($id)
    {
        $item = FoundedItem::findOrFail($id);
        return view('founded_items.show', compact('item')); // Assuming you have a view
    }

    public function store(Request $request)
    {
        try{
            $request['user_nim'] = Auth::user()->nim;

        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|string|max:2048',
            'found_date' => 'required|date',
            'location_option' => 'nullable|string|max:1024',
            'user_nim' => 'required|string|max:20',
        ]);

        FoundedItem::create($request->all());
        return redirect()->route('thanks')->with('success', 'Barang hilang telah dilaporkan!');
        }catch(\Exception $e){
            return Redirect::back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $foundedItem = FoundedItem::findOrFail($id);
        $foundedItem->update($request->all());
        return redirect()->route('founded_items.show', $id)->with('success', 'Item updated successfully!');
    }

    public function destroy($id)
    {
        FoundedItem::destroy($id);
        return redirect()->route('founded_items.index')->with('success', 'Item deleted successfully!');
    }
}
