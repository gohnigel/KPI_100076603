@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Projects</h1>
            <h2>{{ $project->title }}</h2>
            <ul>
                <li>Start date: {{ date_format(date_create($project->start_date), "d/m/Y") }}</li>
                <li>End date: {{ date_format(date_create($project->end_date), "d/m/Y") }}</li>
                <li>Status: {{ $project->status }}</li>
            </ul>

            <a href="/ratingsProjects/{{ $user->id }}/{{ $project->id }}/create"><h2>Add New Rating</h2></a>

            <h3 @if($ratings->isEmpty()) hidden @endif>Ratings</h3>
            <ol>
            @foreach ($ratings as $rating)
                <li><a href="/ratingsProjects/{{ $user->id }}/{{ $project->id }}/{{ $rating->id }}/edit">{{ $rating->name }}</a> - {{ $rating->rating }}/5 <a href="/ratingsProjects/{{ $user->id }}/{{ $project->id }}/{{ $rating->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your rating?')) document.getElementById('rating-delete-form').submit();">Delete</a></li>

                <form id="rating-delete-form" action="/ratingsProjects/{{ $user->id }}/{{ $project->id }}/{{ $rating->id }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            @endforeach
            </ol>
        </div>
    </div>
</div>
@endsection
