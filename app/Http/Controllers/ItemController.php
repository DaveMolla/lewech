<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function create()
    {
        return view('items.create');
    }

    public function feed()
    {
        $items = Item::with('media')->latest()->paginate(10);

        return view('items.feed', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,closed',
            'item_image' => 'required|image',
        ]);

        $item = Item::create([
            'user_id' => Auth::id(),
            'item_name' => $validated['item_name'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('item_image')) {
            $item->addMediaFromRequest('item_image')->toMediaCollection('item_image');
        }

        return redirect()->back()->with('success', 'Item created successfully.');
    }
}
