<?php

namespace App\Http\Controllers;

use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('ratings.index', compact('users'));
    }

    public function profile(User $user)
    {
        return view('ratings.profile', compact('user'));
    }
}
