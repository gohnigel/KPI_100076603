<?php

namespace App\Http\Controllers;

use App\Supervision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisions = Supervision::where('user_id', Auth::user()->id)->get();
        return view('profile.supervisions.index', compact('supervisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.supervisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateSupervision($request);

        Supervision::create($this->addOrEditSupervision());

        return redirect('/supervisions')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supervision  $supervision
     * @return \Illuminate\Http\Response
     */
    public function show(Supervision $supervision)
    {
        return view('profile.supervisions.show', compact('supervision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supervision  $supervision
     * @return \Illuminate\Http\Response
     */
    public function edit(Supervision $supervision)
    {
        return view('profile.supervisions.edit', compact('supervision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supervision  $supervision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supervision $supervision)
    {
        $this->validateSupervision($request);

        $supervision->update($this->addOrEditSupervision());

        return redirect('/supervisions')->with('success', 'Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supervision  $supervision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supervision $supervision)
    {
        Supervision::destroy($supervision->id);

        return redirect('/supervisions');
    }

    protected function validateSupervision($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'supervisor' => 'required|max:255',
            'subject' => 'required|max:255'
        ]);
    }

    protected function addOrEditSupervision()
    {
        return [
            'name' => request('name'),
            'supervisor' => request('supervisor'),
            'subject' => request('subject'),
            'user_id' => Auth::user()->id
        ];
    }
}
