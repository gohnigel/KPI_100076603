<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveProjectController extends Controller
{
    public function index(User $user)
    {
        $projects = Project::where([['user_id', $user->id], ['approve', null]])->get();
        return view('approve.projects.index',compact('user'), compact('projects'));
    }

    public function show(User $user, Project $project)
    {
        return view('approve.projects.show', compact('user'), compact('project'));
    }

    public function approve(User $user, Project $project)
    {
        return view('approve.projects.approve', compact('user'), compact('project'));
    }

    public function update(User $user, Project $project, Request $request)
    {
        $this->validateProject($request);

        $project->update($this->approveProject($project));

        return redirect('/approveProjects/' . $user->id);
    }

    protected function validateProject($request)
    {
        return $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|max:255',
            'approve' => 'required|boolean'
        ]);
    }

    protected function approveProject($project)
    {
        return [
            'title' => request('title'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'status' => request('status'),
            'approve' => request('approve'),
            'user_id' => $project->user_id
        ];
    }
}
