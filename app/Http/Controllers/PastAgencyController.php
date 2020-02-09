<?php

namespace App\Http\Controllers;

use App\PastAgency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PastAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastAgencies = PastAgency::where('user_id', Auth::user()->id)->get();
        return view('profile.pastAgencies.index', compact('pastAgencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.pastAgencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatePastAgency($request);

        PastAgency::create($this->addOrEditPastAgency());

        return redirect('/pastAgencies')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PastAgency  $pastAgency
     * @return \Illuminate\Http\Response
     */
    public function show(PastAgency $pastAgency)
    {
        return view('profile.pastAgencies.show', compact('pastAgency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PastAgency  $pastAgency
     * @return \Illuminate\Http\Response
     */
    public function edit(PastAgency $pastAgency)
    {
        return view('profile.pastAgencies.edit', compact('pastAgency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PastAgency  $pastAgency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PastAgency $pastAgency)
    {
        $this->validatePastAgency($request);

        $pastAgency->update($this->addOrEditPastAgency());

        return redirect('/pastAgencies')->with('success', 'Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PastAgency  $pastAgency
     * @return \Illuminate\Http\Response
     */
    public function destroy(PastAgency $pastAgency)
    {
        PastAgency::destroy($pastAgency->id);

        return redirect('/pastAgencies');
    }

    protected function validatePastAgency($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
    }

    protected function addOrEditPastAgency()
    {
        return [
            'name' => request('name'),
            'address' => request('address'),
            'user_id' => Auth::user()->id
        ];
    }
}
