<?php

namespace App\Http\Controllers;

use App\Supervision;
use App\User;
use Illuminate\Http\Request;

class ApproveSupervisionController extends Controller
{
    public function index(User $user)
    {
        $supervisions = Supervision::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.supervisions.index', compact('user'), compact('supervisions'));
    }

    public function show(User $user, Supervision $supervision)
    {
        return view('approve.supervisions.show', compact('user'), compact('supervision'));
    }

    public function approve(User $user, Supervision $supervision)
    {
        return view('approve.supervisions.approve', compact('user'), compact('supervision'));
    }

    public function update(Request $request, User $user, Supervision $supervision)
    {
        $this->validateSupervision($request);

        $supervision->update($this->approveSupervision($supervision));

        return redirect('/approveSupervisions/' . $user->id);
    }

    protected function validateSupervision($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'supervisor' => 'required|max:255',
            'subject' => 'required|max:255',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approveSupervision($supervision)
    {
        return [
            'name' => request('name'),
            'supervisor' => request('supervisor'),
            'subject' => request('subject'),
            'approve' => request('approve'),
            'user_id' => $supervision->user_id
        ];
    }
}
