<?php

namespace App\Http\Controllers;

use App\PastAgency;
use App\User;
use Illuminate\Http\Request;

class ApprovePastAgencyController extends Controller
{
    public function index(User $user)
    {
        $pastAgencies = PastAgency::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.pastAgencies.index', compact('pastAgencies'), compact('user'));
    }

    public function show(User $user, PastAgency $pastAgency)
    {
        return view('approve.pastAgencies.show', compact('pastAgency'), compact('user'));
    }

    public function approve(User $user, PastAgency $pastAgency)
    {
        return view('approve.pastAgencies.approve', compact('pastAgency'), compact('user'));
    }

    public function update(User $user, PastAgency $pastAgency, Request $request)
    {
        $this->validatePastAgency($request);

        $pastAgency->update($this->approvePastAgency($pastAgency));

        return redirect('/approvePastAgencies/' . $user->id . '/' . $pastAgency->user_id);
    }

    protected function validatePastAgency($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approvePastAgency($pastAgency)
    {
        return [
            'name' => request('name'),
            'address' => request('address'),
            'approve' => request('approve'),
            'user_id' => $pastAgency->user_id
        ];
    }
}
