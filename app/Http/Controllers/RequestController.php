<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        // Retrieve the requests made to the user's items
        $userId = auth()->id();
        $requests = Request::where('receiver_user_id', $userId)->get();
        // Here you'll return the view with the user's requests
        return view('requests.index', compact('requests'));
    }
}
