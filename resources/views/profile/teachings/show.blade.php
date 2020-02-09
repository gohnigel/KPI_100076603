@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Teachings</h1>
            <a @if($teaching->approve == 1) href="/teachings/{{ $teaching->id }}/edit" @endif><h2>{{ $teaching->name }}</h2></a>
            <ul>
                <li>Teacher: {{ $teaching->teacher }}</li>
                <li>Subject: {{ $teaching->subject }}</li>
            </ul>

            @if(is_null($teaching->approve))<p style="color: red;">Your teaching is waiting for approval</p> @endif

            <p><a href="/teachings/{{ $teaching->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your teaching?')) document.getElementById('teaching-delete-form').submit();">Delete</a></p>

            <form id="teaching-delete-form" action="/teachings/{{ $teaching->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
