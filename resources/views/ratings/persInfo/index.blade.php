@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Personal Information of {{ $user->name }}</h1>
            @forelse ($persInfo as $pers)
                <h2>{{ $pers->name }}</h2>
                <ul>
                    <li>Date of birth: {{ date_format(date_create($pers->dob), "d/m/Y") }}</li>
                    <li>Gender: {{ $pers->gender }}</li>
                    <li>Address: {{ $pers->address }}</li>
                    <li>Phone number: {{ $pers->phone }}</li>
                </ul>

                <a href="/ratingsPersInfo/{{ $user->id }}/{{ $pers->id }}/create"><h2>Add New Rating</h2></a>

                <h3 @if($ratings->isEmpty()) hidden @endif>Ratings</h3>
                <ol>
                @foreach ($ratings as $rating)
                    <li><a href="/ratingsPersInfo/{{ $user->id }}/{{ $pers->id }}/{{ $rating->id }}/edit">{{ $rating->name }}</a> - {{ $rating->rating }}/5 <a href="/ratingsPersInfo/{{ $user->id }}/{{ $pers->id }}/{{ $rating->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your rating?')) document.getElementById('rating-delete-form').submit();">Delete</a></li>

                    <form id="rating-delete-form" action="/ratingsPersInfo/{{ $user->id }}/{{ $pers->id }}/{{ $rating->id }}" method="POST" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                @endforeach
                </ol>
            @empty
                <h2>No personal information to rate</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
