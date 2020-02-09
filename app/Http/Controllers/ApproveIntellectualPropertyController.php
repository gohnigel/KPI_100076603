<?php

namespace App\Http\Controllers;

use App\IntellectualProperty;
use App\User;
use Illuminate\Http\Request;

class ApproveIntellectualPropertyController extends Controller
{
    public function index(User $user)
    {
        $intellectualProperty = IntellectualProperty::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.intProp.index', compact('user'), compact('intellectualProperty'));
    }

    public function show(User $user, IntellectualProperty $intProp)
    {
        return view('approve.intProp.show', compact('user'), compact('intProp'));
    }

    public function approve(User $user, IntellectualProperty $intProp)
    {
        return view('approve.intProp.approve', compact('user'), compact('intProp'));
    }

    public function update(Request $request, User $user, IntellectualProperty $intProp)
    {
        $this->validateIntellectualProperty($request);

        $intProp->update($this->approveIntellectualProperty($intProp));

        return redirect('/approveIntProp/' . $user->id);
    }

    protected function validateIntellectualProperty($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approveIntellectualProperty($intProp)
    {
        return [
            'name' => request('name'),
            'type' => request('type'),
            'approve' => request('approve'),
            'user_id' => $intProp->user_id
        ];
    }
}
