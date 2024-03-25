<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $requests = $user->requestsMade;
        $itemRequests = $user->items()
            ->with('itemRequests')
            ->get()
            ->pluck('itemRequests')
            ->collapse();

        return view('requests.index', compact('requests','itemRequests'));
    }
}
