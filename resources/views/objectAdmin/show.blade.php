@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Objects</h1>
            <a href="/objectAdmin/{{ $objectAdmin->id }}/edit"><h2>{{ $objectAdmin->name }}</h2></a>
            <ul>
                <li>Type of object: {{ $objectAdmin->type }}</li>
            </ul>

            <p><a href="/objectAdmin/{{ $objectAdmin->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your object?')) document.getElementById('objectAdmin-delete-form').submit();">Delete</a></p>

            <form id="objectAdmin-delete-form" action="/objectAdmin/{{ $objectAdmin->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
