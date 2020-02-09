@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Profile Page of {{ $user->name }}</h1>
            <a href="/approvePersInfo/{{ $user->id }}"><h2>Personal Information</h2></a>
            <a href="/approveProjects/{{ $user->id }}"><h2>Project</h2></a>
            <a href="/approvePublications/{{ $user->id }}"><h2>Publication</h2></a>
            <a href="/approveIntProp/{{ $user->id }}"><h2>Intellectual Property</h2></a>
            <a href="/approveSupervisions/{{ $user->id }}"><h2>Supervision</h2></a>
            <a href="/approveTeachings/{{ $user->id }}"><h2>Teaching</h2></a>
            <a href="/approveConsultations/{{ $user->id }}"><h2>Consultation</h2></a>
            <a href="/approveComSer/{{ $user->id }}"><h2>Community Service</h2></a>
            <a href="/approvePastAgencies/{{ $user->id }}"><h2>Past Agency</h2></a>
        </div>
    </div>
</div>
@endsection
