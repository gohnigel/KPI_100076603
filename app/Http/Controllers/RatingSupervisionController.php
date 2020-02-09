<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Supervision;
use App\User;
use Illuminate\Http\Request;

class RatingSupervisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $supervisions = Supervision::where('user_id', $user->id)->get();
        return view('ratings.supervisions.index', ['user' => $user, 'supervisions' => $supervisions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Supervision $supervision)
    {
        return view('ratings.supervisions.create', ['user' => $user, 'supervision' => $supervision ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Supervision $supervision)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($supervision));

        return redirect('/ratingsSupervisions/' . $user->id . '/' . $supervision->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Supervision $supervision)
    {
        $ratings = Rating::where('supervision_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.supervisions.show', ['user' => $user, 'supervision' => $supervision, 'ratings' => $ratings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Supervision $supervision, Rating $rating)
    {
        return view('ratings.supervisions.edit', ['user' => $user, 'supervision' => $supervision, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Supervision $supervision, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($supervision));

        return redirect('/ratingsSupervisions/' . $user->id . '/' . $supervision->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Supervision $supervision, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsSupervisions/' . $user->id . '/' . $supervision->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($supervision)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'supervision_id' => $supervision->id
        ];
    }
}
