<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Teaching;
use App\User;
use Illuminate\Http\Request;

class RatingTeachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $teachings = Teaching::where('user_id', $user->id)->get();
        return view('ratings.teachings.index', ['user' => $user, 'teachings' => $teachings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Teaching $teaching)
    {
        return view('ratings.teachings.create', ['user' => $user, 'teaching' => $teaching ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Teaching $teaching)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($teaching));

        return redirect('/ratingsTeachings/' . $user->id . '/' . $teaching->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Teaching $teaching)
    {
        $ratings = Rating::where('teaching_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.teachings.show', ['user' => $user, 'teaching' => $teaching, 'ratings' => $ratings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Teaching $teaching, Rating $rating)
    {
        return view('ratings.teachings.edit', ['user' => $user, 'teaching' => $teaching, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Teaching $teaching, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($teaching));

        return redirect('/ratingsTeachings/' . $user->id . '/' . $teaching->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Teaching $teaching, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsTeachings/' . $user->id . '/' . $teaching->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($teaching)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'teaching_id' => $teaching->id
        ];
    }
}
