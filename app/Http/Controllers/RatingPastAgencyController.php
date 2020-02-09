<?php

namespace App\Http\Controllers;

use App\PastAgency;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingPastAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $pastAgencies = PastAgency::where('user_id', $user->id)->get();
        return view('ratings.pastAgencies.index', ['user' => $user, 'pastAgencies' => $pastAgencies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, PastAgency $pastAgency)
    {
        return view('ratings.pastAgencies.create', ['user' => $user, 'pastAgency' => $pastAgency]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, PastAgency $pastAgency)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($pastAgency));

        return redirect('/ratingsPastAgencies/' . $user->id . '/' . $pastAgency->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, PastAgency $pastAgency)
    {
        $ratings = Rating::where('pastAgency_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.pastAgencies.show', ['user' => $user, 'pastAgency' => $pastAgency, 'ratings' => $ratings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, PastAgency $pastAgency, Rating $rating)
    {
        return view('ratings.pastAgencies.edit', ['user' => $user, 'pastAgency' => $pastAgency, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, PastAgency $pastAgency, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($pastAgency));

        return redirect('/ratingsPastAgencies/' . $user->id . '/' . $pastAgency->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, PastAgency $pastAgency, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsPastAgencies/' . $user->id . '/' . $pastAgency->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($pastAgency)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'pastAgency_id' => $pastAgency->id
        ];
    }
}
