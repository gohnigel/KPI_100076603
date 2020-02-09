<?php

namespace App\Http\Controllers;

use App\Project;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $projects = Project::where('user_id', $user->id)->get();
        return view('ratings.projects.index', ['user' => $user, 'projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Project $project)
    {
        return view('ratings.projects.create', ['user' => $user, 'project' => $project ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Project $project)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($project));

        return redirect('/ratingsProjects/' . $user->id . '/' . $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Project $project)
    {
        $ratings = Rating::where('project_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.projects.show', ['user' => $user, 'project' => $project, 'ratings' => $ratings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Project $project, Rating $rating)
    {
        return view('ratings.projects.edit', ['user' => $user, 'project' => $project, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Project $project, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($project));

        return redirect('/ratingsProjects/' . $user->id . '/' . $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Project $project, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsProjects/' . $user->id . '/' . $project->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($project)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'project_id' => $project->id
        ];
    }
}
