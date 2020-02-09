@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Personal Information of {{ $user->name }}</h1>
            @forelse ($persInfo as $pers)
            <a href="/approvePersInfo/{{ $user->id }}/{{ $pers->id }}/approve"><h2>{{ $pers->name }}</h2></a>
                <ul>
                    <li>Date of birth: {{ date_format(date_create($pers->dob), "d/m/Y") }}</li>
                    <li>Gender: {{ $pers->gender }}</li>
                    <li>Address: {{ $pers->address }}</li>
                    <li>Phone number: {{ $pers->phone }}</li>
                </ul>
            @empty
                <h2>No personal information to approve</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
