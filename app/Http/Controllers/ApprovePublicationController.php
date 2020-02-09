<?php

namespace App\Http\Controllers;

use App\Publication;
use App\User;
use Illuminate\Http\Request;

class ApprovePublicationController extends Controller
{
    public function index(User $user)
    {
        $publications = Publication::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.publications.index', compact('user'), compact('publications'));
    }

    public function show(User $user, Publication $publication)
    {
        return view('approve.publications.show', compact('user'), compact('publication'));
    }

    public function approve(User $user, Publication $publication)
    {
        return view('approve.publications.approve', compact('user'), compact('publication'));
    }

    public function update(Request $request, User $user, Publication $publication)
    {
        $this->validatePublication($request);

        $publication->update($this->approvePublication($publication));

        return redirect('/approvePublications/' . $user->id);
    }

    protected function validatePublication($request)
    {
        return $request->validate([
            'title' => 'required|max:255',
            'volume' => 'required|integer',
            'yop' => 'required|integer',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approvePublication($publication)
    {
        return [
            'title' => request('title'),
            'volume' => request('volume'),
            'yop' => request('yop'),
            'approve' => request('approve'),
            'user_id' => $publication->user_id
        ];
    }
}
