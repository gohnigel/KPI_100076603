@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approve Publication of {{ $user->name }}</h1>

            <form action="/approvePublications/{{ $user->id }}/{{ $publication->id }}" method="post">
                @csrf
                @method('put')
                {{-- Title of publication --}}
                <p class="form-group">
                    <label for="title">Publication title</label>

                    <input
                        @error('title') style="color: red;" @enderror
                        type="text"
                        name="title"
                        id="title"
                        value="{{ $publication->title }}"
                        maxlength="255"
                        readonly
                        required>

                    @error('title')
                    <span style="color: red;">{{ $errors->first('title') }}</span>
                    @enderror
                <p>

                {{-- Volume of publication --}}
                <p class="form-group">
                    <label for="volume">Volume of publication</label>

                    <input
                        @error('volume') style="color: red;" @enderror
                        type="number"
                        name="volume"
                        id="volume"
                        value="{{ $publication->volume }}"
                        readonly
                        required>

                    @error('volume')
                    <span style="color: red;">{{ $errors->first('volume') }}</span>
                    @enderror
                </p>

                {{-- Year of publication --}}
                <p class="form-group">
                    <label for="yop">Year of publication</label>

                    <input
                        @error('yop') style="color: red;" @enderror
                        type="number"
                        name="yop"
                        id="yop"
                        value="{{ $publication->yop }}"
                        max="{{ date('Y') }}"
                        readonly
                        required>

                    @error('yop')
                    <span style="color: red;">{{ $errors->first('yop') }}</span>
                    @enderror
                </p>

                {{-- Approve or reject publication --}}
                <p class="form-group">
                    <label>Publication approval</label>
                        <input
                            @error('approve') style="color: red;" @enderror
                            type="radio"
                            name="approve"
                            id="approve"
                            value="0"
                            required>
                        <label for="approve">Approve</label>

                        <input
                            @error('approve') style="color: red;" @enderror
                            type="radio"
                            name="approve"
                            id="reject"
                            value="1"
                            required>
                        <label for="reject">Reject</label>

                        @error('approve')
                        <span style="color: red;">{{ $errors->first('approve') }}</span>
                        @enderror
                </p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
