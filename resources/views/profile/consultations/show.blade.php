@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Consultations</h1>
            <a @if($consultation->approve == 1) href="/consultations/{{ $consultation->id }}/edit" @endif><h2>{{ $consultation->name }}</h2></a>
            <ul>
                <li>Consultant: {{ $consultation->consultant }}</li>
            </ul>

            @if(is_null($consultation->approve))<p style="color: red;">Your consultation is waiting for approval</p> @endif

            <p><a href="/consultations/{{ $consultation->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your consultation?')) document.getElementById('consultation-delete-form').submit();">Delete</a></p>

            <form id="consultation-delete-form" action="/consultations/{{ $consultation->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
