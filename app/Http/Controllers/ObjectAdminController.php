<?php

namespace App\Http\Controllers;

use App\ObjectAdmin;
use Illuminate\Http\Request;

class ObjectAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objectAdmins = ObjectAdmin::all();
        return view('objectAdmin.index', compact('objectAdmins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('objectAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ObjectAdmin::create($this->validateObjectAdmin($request));

        return redirect('/objectAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObjectAdmin  $objectAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(ObjectAdmin $objectAdmin)
    {
        return view('objectAdmin.show', compact('objectAdmin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ObjectAdmin  $objectAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(ObjectAdmin $objectAdmin)
    {
        return view('objectAdmin.edit', compact('objectAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ObjectAdmin  $objectAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjectAdmin $objectAdmin)
    {
        $objectAdmin->update($this->validateObjectAdmin($request));

        return redirect('/objectAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ObjectAdmin  $objectAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjectAdmin $objectAdmin)
    {
        ObjectAdmin::destroy($objectAdmin->id);

        return redirect('/objectAdmin');
    }

    protected function validateObjectAdmin($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'enable' => 'required|boolean'
        ]);
    }
}
