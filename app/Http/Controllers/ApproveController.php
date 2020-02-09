<?php

namespace App\Http\Controllers;

use App\PersonalInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('approve.index', compact('users'));
    }

    public function profile(User $user)
    {
        return view('approve.profile', compact('user'));
    }
}
