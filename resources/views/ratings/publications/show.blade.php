@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Publication</h1>
            <h2>{{ $publication->title }}</h2>
            <ul>
                <li>Volume: {{ $publication->volume }}</li>
                <li>Year of publication: {{ $publication->yop }}</li>
            </ul>

            <a href="/ratingsPublications/{{ $user->id }}/{{ $publication->id }}/create"><h2>Add New Rating</h2></a>

            <h3 @if($ratings->isEmpty()) hidden @endif>Ratings</h3>
            <ol>
            @foreach ($ratings as $rating)
                <li><a href="/ratingsProjects/{{ $user->id }}/{{ $publication->id }}/{{ $rating->id }}/edit">{{ $rating->name }}</a> - {{ $rating->rating }}/5 <a href="/ratingsProjects/{{ $user->id }}/{{ $publication->id }}/{{ $rating->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your rating?')) document.getElementById('rating-delete-form').submit();">Delete</a></li>

                <form id="rating-delete-form" action="/ratingsProjects/{{ $user->id }}/{{ $publication->id }}/{{ $rating->id }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            @endforeach
            </ol>
        </div>
    </div>
</div>
@endsection
