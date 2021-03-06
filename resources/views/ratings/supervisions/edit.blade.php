@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Ratings for Supervisions of {{ $user->name }}</h1>

            <form action="/ratingsSupervisions/{{ $user->id }}/{{ $supervision->id }}/{{ $rating->id }}" method="post">
                @csrf
                @method('put')
                {{-- Name of rating --}}
                <p class="form-group">
                    <label for="name">Name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $rating->name }}"
                        maxlength="255"
                        required>

                    @error('name')
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @enderror
                <p>

                {{-- Date of birth of user --}}
                <p class="form-group">
                    <label for="rating">Rating</label>

                    <input
                        @error('rating') style="color: red;" @enderror
                        type="number"
                        name="rating"
                        id="rating"
                        value="{{ $rating->rating }}"
                        max="5"
                        required>

                    / 5

                    @error('rating')
                    <span style="color: red;">{{ $errors->first('rating') }}</span>
                    @enderror
                </p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
