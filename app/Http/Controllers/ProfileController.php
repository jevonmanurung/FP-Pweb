<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('profile', compact('user'));
    }
}
