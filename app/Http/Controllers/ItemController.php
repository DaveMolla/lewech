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
    public function show(Item $item)
    {
        $item->load('itemRequests.sender', 'media');
        return view('items.show', compact('item'));
    }

    public function myItems()
    {
        if (Auth::check()) {
            $items = Auth::user()->items;
            // dd($items);
        } else {
            $items = collect();
        }
        return view('dashboard', ['items' => $items]);
    }
    public function myItemRequests()
    {
        $user = Auth::user();
        $itemRequests = $user->items()
            ->with([
                'itemRequests' => function ($query) {
                    $query->latest();
                }
            ])
            ->get()
            ->pluck('itemRequests')
            ->collapse()
            ->sortByDesc('created_at');

        return view('requests.my-item-requests', compact('itemRequests'));
    }

    public function myRequests()
    {
        $user = Auth::user();
        $requests = $user->itemRequests()
            ->latest()
            ->get();

        return view('requests.index', compact('requests'));
    }

    public function closeStatus(Item $item)
    {
        $item->update(['status' => 'closed']);
        return back()->with('success', 'Status updated successfully.');
    }

    public function reopenStatus(Item $item)
    {
        $item->update(['status' => 'open']);
        return back()->with('success', 'Status updated successfully.');
    }

}
