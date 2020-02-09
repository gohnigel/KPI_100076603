<?php

namespace App\Http\Controllers;

use App\PersonalInformation;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingPersonalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $persInfo = PersonalInformation::where('user_id', $user->id)->get();
        $ratings = Rating::where('persInfo_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.persInfo.index', ['user' => $user, 'persInfo' => $persInfo, 'ratings' => $ratings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, PersonalInformation $persInfo)
    {
        return view('ratings.persInfo.create', ['user' => $user, 'persInfo' => $persInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, PersonalInformation $persInfo)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($persInfo));

        return redirect('/ratingsPersInfo/' . $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, PersonalInformation $persInfo, Rating $rating)
    {
        return view('ratings.persInfo.edit', ['user' => $user, 'persInfo' => $persInfo, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, PersonalInformation $persInfo, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($persInfo));

        return redirect('/ratingsPersInfo/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, PersonalInformation $persInfo, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsPersInfo/' . $user->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($persInfo)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'persInfo_id' => $persInfo->id
        ];
    }
}
