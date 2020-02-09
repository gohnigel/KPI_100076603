<?php

namespace App\Http\Controllers;

use App\Publication;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $publications = Publication::where('user_id', $user->id)->get();
        return view('ratings.publications.index', ['user' => $user, 'publications' => $publications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Publication $publication)
    {
        return view('ratings.publications.create', ['user' => $user, 'publication' => $publication ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Publication $publication)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($publication));

        return redirect('/ratingsPublications/' . $user->id . '/' . $publication->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Publication $publication)
    {
        $ratings = Rating::where('publication_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.publications.show', ['user' => $user, 'publication' => $publication, 'ratings' => $ratings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Publication $publication, Rating $rating)
    {
        return view('ratings.publications.edit', ['user' => $user, 'publication' => $publication, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Publication $publication, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($publication));

        return redirect('/ratingsPublications/' . $user->id . '/' . $publication->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Publication $publication, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsPublications/' . $user->id . '/' . $publication->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($publication)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'publication_id' => $publication->id
        ];
    }
}
