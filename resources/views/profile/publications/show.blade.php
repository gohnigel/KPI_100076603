@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Publications</h1>
            <a @if($publication->approve == 1) href="/publications/{{ $publication->id }}/edit" @endif><h2>{{ $publication->title }}</h2></a>
            <ul>
                <li>Volume: {{ $publication->volume }}</li>
                <li>Year of publication: {{ $publication->yop }}</li>
            </ul>

            @if(is_null($publication->approve))<p style="color: red;">Your publication is waiting for approval</p> @endif

            <p><a href="/publications/{{ $publication->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your publication?')) document.getElementById('publication-delete-form').submit();">Delete</a></p>

            <form id="publication-delete-form" action="/publications/{{ $publication->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
