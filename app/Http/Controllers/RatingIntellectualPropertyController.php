<?php

namespace App\Http\Controllers;

use App\IntellectualProperty;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingIntellectualPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $intellectualProperty = IntellectualProperty::where('user_id', $user->id)->get();
        return view('ratings.intProp.index', ['user' => $user, 'intellectualProperty' => $intellectualProperty]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, IntellectualProperty $intProp)
    {
        return view('ratings.intProp.create', ['user' => $user, 'intProp' => $intProp ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, IntellectualProperty $intProp)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($intProp));

        return redirect('/ratingsIntProp/' . $user->id . '/' . $intProp->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, IntellectualProperty $intProp)
    {
        $ratings = Rating::where('intProp_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.intProp.show', ['user' => $user, 'intProp' => $intProp, 'ratings' => $ratings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, IntellectualProperty $intProp, Rating $rating)
    {
        return view('ratings.intProp.edit', ['user' => $user, 'intProp' => $intProp, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, IntellectualProperty $intProp, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($intProp));

        return redirect('/ratingsIntProp/' . $user->id . '/' . $intProp->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, IntellectualProperty $intProp, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsIntProp/' . $user->id . '/' . $intProp->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($intProp)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'intProp_id' => $intProp->id
        ];
    }
}
