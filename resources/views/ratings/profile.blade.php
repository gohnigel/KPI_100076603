@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Profile Page of {{ $user->name }}</h1>
            <a href="/ratingsPersInfo/{{ $user->id }}"><h2>Personal Information</h2></a>
            <a href="/ratingsProjects/{{ $user->id }}"><h2>Project</h2></a>
            <a href="/ratingsPublications/{{ $user->id }}"><h2>Publication</h2></a>
            <a href="/ratingsIntProp/{{ $user->id }}"><h2>Intellectual Property</h2></a>
            <a href="/ratingsSupervisions/{{ $user->id }}"><h2>Supervision</h2></a>
            <a href="/ratingsTeachings/{{ $user->id }}"><h2>Teaching</h2></a>
            <a href="/ratingsConsultations/{{ $user->id }}"><h2>Consultation</h2></a>
            <a href="/ratingsComSer/{{ $user->id }}"><h2>Community Service</h2></a>
            <a href="/ratingsPastAgencies/{{ $user->id }}"><h2>Past Agency</h2></a>
        </div>
    </div>
</div>
@endsection
