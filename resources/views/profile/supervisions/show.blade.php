@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Supervisions</h1>
            <a @if($supervision->approve == 1) href="/supervisions/{{ $supervision->id }}/edit" @endif><h2>{{ $supervision->name }}</h2></a>
            <ul>
                <li>Supervisor: {{ $supervision->supervisor }}</li>
                <li>Subject: {{ $supervision->subject }}</li>
            </ul>

            @if(is_null($supervision->approve))<p style="color: red;">Your supervision is waiting for approval</p> @endif

            <p><a href="/supervisions/{{ $supervision->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your supervision?')) document.getElementById('supervision-delete-form').submit();">Delete</a></p>

            <form id="supervision-delete-form" action="/supervisions/{{ $supervision->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
