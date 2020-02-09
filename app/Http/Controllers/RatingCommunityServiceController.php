<?php

namespace App\Http\Controllers;

use App\CommunityService;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingCommunityServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $communityService = CommunityService::where('user_id', $user->id)->get();
        return view('ratings.comSer.index', ['user' => $user, 'communityService' => $communityService]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, CommunityService $comSer)
    {
        return view('ratings.comSer.create', ['user' => $user, 'comSer' => $comSer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, CommunityService $comSer)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($comSer));

        return redirect('/ratingsComSer/' . $user->id . '/' . $comSer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, CommunityService $comSer)
    {
        $ratings = Rating::where('comSer_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.comSer.show', ['user' => $user, 'comSer' => $comSer, 'ratings' => $ratings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, CommunityService $comSer, Rating $rating)
    {
        return view('ratings.comSer.edit', ['user' => $user, 'comSer' => $comSer, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, CommunityService $comSer, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($comSer));

        return redirect('/ratingsComSer/' . $user->id . '/' . $comSer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, CommunityService $comSer, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsComSer/' . $user->id . '/' . $comSer->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($comSer)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'comSer_id' => $comSer->id
        ];
    }
}
