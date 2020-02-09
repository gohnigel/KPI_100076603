<?php

namespace App\Http\Controllers;

use App\Teaching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachings = Teaching::where('user_id', Auth::user()->id)->get();
        return view('profile.teachings.index', compact('teachings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.teachings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateTeaching($request);

        Teaching::create($this->addOrEditTeaching());

        return redirect('/teachings')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function show(Teaching $teaching)
    {
        return view('profile.teachings.show', compact('teaching'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function edit(Teaching $teaching)
    {
        return view('profile.teachings.edit', compact('teaching'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teaching $teaching)
    {
        $this->validateTeaching($request);

        $teaching->update($this->addOrEditTeaching());

        return redirect('/teachings')->with('success', 'Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teaching  $teaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teaching $teaching)
    {
        Teaching::destroy($teaching->id);

        return redirect('/teachings');
    }

    protected function validateTeaching($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'teacher' => 'required|max:255',
            'subject' => 'required|max:255'
        ]);
    }

    protected function addOrEditTeaching()
    {
        return [
            'name' => request('name'),
            'teacher' => request('teacher'),
            'subject' => request('subject'),
            'user_id' => Auth::user()->id
        ];
    }
}
