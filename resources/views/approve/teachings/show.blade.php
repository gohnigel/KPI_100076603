@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Teachings of {{ $user->name }}</h1>
            <a href="/approveTeachings/{{ $user->id }}/{{ $teaching->id }}/approve"><h2>{{ $teaching->name }}</h2></a>
            <ul>
                <li>Teacher: {{ $teaching->teacher }}</li>
                <li>Subject: {{ $teaching->subject }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
