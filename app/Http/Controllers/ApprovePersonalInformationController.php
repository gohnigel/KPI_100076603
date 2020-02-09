<?php

namespace App\Http\Controllers;

use App\PersonalInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovePersonalInformationController extends Controller
{
    public function index(User $user)
    {
        $persInfo = PersonalInformation::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.persInfo.index', compact('user'), compact('persInfo'));
    }

    public function approve(User $user, PersonalInformation $persInfo)
    {
        return view('approve.persInfo.approve', compact('user'), compact('persInfo'));
    }

    public function update(Request $request, User $user, PersonalInformation $persInfo)
    {
        $this->validatePersonalInformation($request);

        $persInfo->update($this->approvePersonalInformation($persInfo));

        return redirect('/approvePersInfo/' . $user->id);
    }

    protected function validatePersonalInformation($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'dob' => 'required|date',
            'gender' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approvePersonalInformation($persInfo)
    {
        return [
            'name' => request('name'),
            'dob' => request('dob'),
            'gender' => request('gender'),
            'address' => request('address'),
            'phone' => request('phone'),
            'approve' => request('approve'),
            'user_id' => $persInfo->user_id
        ];
    }
}
