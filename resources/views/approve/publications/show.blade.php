@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Publications of {{ $user->name }}</h1>
            <a href="/approvePublications/{{ $user->id }}/{{ $publication->id }}/approve"><h2>{{ $publication->title }}</h2></a>
            <ul>
                <li>Volume: {{ $publication->volume }}</li>
                <li>Year of publication: {{ $publication->yop }}</li>
            </ul>
    </div>
</div>
@endsection
