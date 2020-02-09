<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

class RatingConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $consultations = Consultation::where('user_id', $user->id)->get();
        return view('ratings.consultations.index', ['user' => $user, 'consultations' => $consultations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Consultation $consultation)
    {
        return view('ratings.consultations.create', ['user' => $user, 'consultation' => $consultation ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Consultation $consultation)
    {
        $this->validateRating($request);

        Rating::create($this->addOrEditRating($consultation));

        return redirect('/ratingsConsultations/' . $user->id . '/' . $consultation->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Consultation $consultation)
    {
        $ratings = Rating::where('consultation_id', '<>', null)->orderBy('rating', 'desc')->get();
        return view('ratings.consultations.show', ['user' => $user, 'consultation' => $consultation, 'ratings' => $ratings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Consultation $consultation, Rating $rating)
    {
        return view('ratings.consultations.edit', ['user' => $user, 'consultation' => $consultation, 'rating' => $rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Consultation $consultation, Rating $rating)
    {
        $this->validateRating($request);

        $rating->update($this->addOrEditRating($consultation));

        return redirect('/ratingsConsultations/' . $user->id . '/' . $consultation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Consultation $consultation, Rating $rating)
    {
        Rating::destroy($rating->id);

        return redirect('/ratingsConsultations/' . $user->id . '/' . $consultation->id);
    }

    protected function validateRating($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|max:5'
        ]);
    }

    protected function addOrEditRating($consultation)
    {
        return [
            'name' => request('name'),
            'rating' => request('rating'),
            'consultation_id' => $consultation->id
        ];
    }
}
