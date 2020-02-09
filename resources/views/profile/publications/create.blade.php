@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create Publication</h1>

            <form action="/publications" method="post">
                @csrf
                {{-- Title of publication --}}
                <p class="form-group">
                    <label for="title">Publication title</label>

                    <input
                        @error('title') style="color: red;" @enderror
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        maxlength="255"
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
                        value="{{ old('volume') }}"
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
                        value="{{ old('yop') }}"
                        max="{{ date('Y') }}"
                        required>

                    @error('yop')
                    <span style="color: red;">{{ $errors->first('yop') }}</span>
                    @enderror
                </p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
