<?php

namespace App\Http\Controllers;

use App\Teaching;
use App\User;
use Illuminate\Http\Request;

class ApproveTeachingController extends Controller
{
    public function index(User $user)
    {
        $teachings = Teaching::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.teachings.index', compact('user'), compact('teachings'));
    }

    public function show(User $user, Teaching $teaching)
    {
        return view('approve.teachings.show', compact('user'), compact('teaching'));
    }

    public function approve(User $user, Teaching $teaching)
    {
        return view('approve.teachings.approve', compact('user'), compact('teaching'));
    }

    public function update(Request $request, User $user, Teaching $teaching)
    {
        $this->validateTeaching($request);

        $teaching->update($this->approveTeaching($teaching));

        return redirect('/approveTeachings/' . $user->id);
    }

    protected function validateTeaching($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'teacher' => 'required|max:255',
            'subject' => 'required|max:255',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approveTeaching($teaching)
    {
        return [
            'name' => request('name'),
            'teacher' => request('teacher'),
            'subject' => request('subject'),
            'approve' => request('approve'),
            'user_id' => $teaching->user_id
        ];
    }
}
