<?php

namespace App\Http\Controllers;

use App\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persInfo = PersonalInformation::where('user_id', Auth::user()->id)->get();
        return view('profile.persInfo.index', compact('persInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.persInfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(DB::table('personal_information')->where('user_id', Auth::user()->id)->get()->isEmpty()){
            $this->validatePersonalInformation($request);

            PersonalInformation::create($this->addOrEditPersonalInformation());

            return redirect('/persInfo')->with('success', 'Created Successfully');
        }

        return redirect()->back()->withErrors(['name' => 'Cannot add more than one personal information']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalInformation $persInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalInformation $persInfo)
    {
        return view('profile.persInfo.edit', compact('persInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalInformation $persInfo)
    {
        $this->validatePersonalInformation($request);

        $persInfo->update($this->addOrEditPersonalInformation());

        return redirect('/persInfo')->with('success', 'Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalInformation $persInfo)
    {
        PersonalInformation::destroy($persInfo->id);

        return redirect('/persInfo');
    }

    protected function validatePersonalInformation($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'dob' => 'required|date',
            'gender' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);
    }

    protected function addOrEditPersonalInformation()
    {
        return [
            'name' => request('name'),
            'dob' => request('dob'),
            'gender' => request('gender'),
            'address' => request('address'),
            'phone' => request('phone'),
            'approve' => null,
            'user_id' => Auth::user()->id
        ];
    }
}
