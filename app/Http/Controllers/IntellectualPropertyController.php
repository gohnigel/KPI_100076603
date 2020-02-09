<?php

namespace App\Http\Controllers;

use App\IntellectualProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntellectualPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intellectualProperty = IntellectualProperty::where('user_id', Auth::user()->id)->get();
        return view('profile.intProp.index', compact('intellectualProperty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.intProp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateIntellectualProperty($request);

        IntellectualProperty::create($this->addOrEditIntellectualProperty());

        return redirect('/intProp')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IntellectualProperty  $intellectualProperty
     * @return \Illuminate\Http\Response
     */
    public function show(IntellectualProperty $intProp)
    {
        return view('profile.intProp.show', compact('intProp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IntellectualProperty  $intellectualProperty
     * @return \Illuminate\Http\Response
     */
    public function edit(IntellectualProperty $intProp)
    {
        return view('profile.intProp.edit', compact('intProp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IntellectualProperty  $intellectualProperty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IntellectualProperty $intProp)
    {
        $this->validateIntellectualProperty($request);

        $intProp->update($this->addOrEditIntellectualProperty());

        return redirect('/intProp')->with('success', 'Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IntellectualProperty  $intellectualProperty
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntellectualProperty $intProp)
    {
        IntellectualProperty::destroy($intProp->id);

        return redirect('/intProp');
    }

    protected function validateIntellectualProperty($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
        ]);
    }

    protected function addOrEditIntellectualProperty()
    {
        return [
            'name' => request('name'),
            'type' => request('type'),
            'user_id' => Auth::user()->id
        ];
    }
}
