<?php

namespace App\Http\Controllers;

use App\CommunityService;
use App\User;
use Illuminate\Http\Request;

class ApproveCommunityServiceController extends Controller
{
    public function index(User $user)
    {
        $communityService = CommunityService::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.comSer.index', compact('user'), compact('communityService'));
    }

    public function show(User $user, CommunityService $comSer)
    {
        return view('approve.comSer.show', compact('user'), compact('comSer'));
    }

    public function approve(User $user, CommunityService $comSer)
    {
        return view('approve.comSer.approve', compact('user'), compact('comSer'));
    }

    public function update(User $user, Request $request, CommunityService $comSer)
    {
        $this->validateCommunityService($request);

        $comSer->update($this->approveCommunityService($comSer));

        return redirect('/approveComSer/' . $user->id);
    }

    protected function validateCommunityService($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approveCommunityService($comSer)
    {
        return [
            'name' => request('name'),
            'type' => request('type'),
            'approve' => request('approve'),
            'user_id' => $comSer->user_id
        ];
    }
}
