<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Request as ItemRequest; // Assuming you have a Request model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemRequestController extends Controller
{
    public function create(Item $item)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to make a request.');
        }

        if ($item->status !== 'open') {
            return redirect()->back()->with('error', 'This item is not available for requests.');
        }

        return view('item-requests.create', [
            'sender_user_id' => Auth::id(),
            'receiver_user_id' => $item->user_id,
            'item_id' => $item->id,
            'item' => $item
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'message' => 'required|string',
            'status' => 'required|in:pending,accepted,rejected',
            'image' => 'required|image',
        ]);

        $itemRequest = ItemRequest::create([
            'sender_user_id' => Auth::id(),
            'receiver_user_id' => $validated['receiver_user_id'],
            'item_id' => $validated['item_id'],
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        if ($request->hasFile('image')) {
            $itemRequest->addMediaFromRequest('image')->toMediaCollection('request-images');
        }

        $itemRequest->save();

        return redirect()->route('feed')->with('success', 'Request sent successfully.');
    }
}
