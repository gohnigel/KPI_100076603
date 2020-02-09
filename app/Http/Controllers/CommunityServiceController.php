<?php

namespace App\Http\Controllers;

use App\CommunityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communityService = CommunityService::where('user_id', Auth::user()->id)->get();
        return view('profile.comSer.index', compact('communityService'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.comSer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateCommunityService($request);

        CommunityService::create($this->addOrEditCommunityService());

        return redirect('/comSer')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommunityService  $communityService
     * @return \Illuminate\Http\Response
     */
    public function show(CommunityService $comSer)
    {
        return view('profile.comSer.show', compact('comSer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommunityService  $communityService
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityService $comSer)
    {
        return view('profile.comSer.edit', compact('comSer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommunityService  $communityService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunityService $comSer)
    {
        $this->validateCommunityService($request);

        $comSer->update($this->addOrEditCommunityService());

        return redirect('/comSer')->with('success', 'Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommunityService  $communityService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunityService $comSer)
    {
        CommunityService::destroy($comSer->id);

        return redirect('/comSer');
    }

    protected function validateCommunityService($request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
        ]);
    }

    protected function addOrEditCommunityService()
    {
        return [
            'name' => request('name'),
            'type' => request('type'),
            'user_id' => Auth::user()->id
        ];
    }
}
