@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Intellectual Property</h1>
            <a @if($intProp->approve == 1) href="/intProp/{{ $intProp->id }}/edit" @endif><h2>{{ $intProp->name }}</h2></a>
            <ul>
                <li>Type of intellectual property: {{ $intProp->type }}</li>
            </ul>

            @if(is_null($intProp->approve))<p style="color: red;">Your intellectual property is waiting for approval</p> @endif

            <p><a href="/intProp/{{ $intProp->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your intellectual property?')) document.getElementById('intProp-delete-form').submit();">Delete</a></p>

            <form id="intProp-delete-form" action="/intProp/{{ $intProp->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
