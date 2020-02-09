@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Personal Information</h1>
            <a href="/persInfo/create" @if($persInfo->isNotEmpty()) hidden @endif><h2>Add New Personal Information</h2></a>
            @foreach ($persInfo as $pers)
                <a @if($pers->approve == 1) href="/persInfo/{{ $pers->id }}/edit" @endif><h2>{{ $pers->name }}</h2></a>

                <ul>
                    <li>Date of birth: {{ date_format(date_create($pers->dob), "d/m/Y") }}</li>
                    <li>Gender: {{ $pers->gender }}</li>
                    <li>Address: {{ $pers->address }}</li>
                    <li>Phone number: {{ $pers->phone }}</li>
                </ul>

                @if(is_null($pers->approve))<p style="color: red;">Your personal information is waiting for approval</p> @endif

                <p><a href="/persInfo/{{ $pers->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your personal information?')) document.getElementById('persInfo-delete-form').submit();">Delete</a></p>

                <form id="persInfo-delete-form" action="/persInfo/{{ $pers->id }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
