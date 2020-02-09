@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Community Service</h1>
            <h2>{{ $comSer->name }}</h2>
            <ul>
                <li>Service type: {{ $comSer->type }}</li>
            </ul>

            <a href="/ratingsComSer/{{ $user->id }}/{{ $comSer->id }}/create"><h2>Add New Rating</h2></a>

            <h3 @if($ratings->isEmpty()) hidden @endif>Ratings</h3>
            <ol>
            @foreach ($ratings as $rating)
                <li><a href="/ratingsComSer/{{ $user->id }}/{{ $comSer->id }}/{{ $rating->id }}/edit">{{ $rating->name }}</a> - {{ $rating->rating }}/5 <a href="/ratingsComSer/{{ $user->id }}/{{ $comSer->id }}/{{ $rating->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your rating?')) document.getElementById('rating-delete-form').submit();">Delete</a></li>

                <form id="rating-delete-form" action="/ratingsComSer/{{ $user->id }}/{{ $comSer->id }}/{{ $rating->id }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            @endforeach
            </ol>
        </div>
    </div>
</div>
@endsection
