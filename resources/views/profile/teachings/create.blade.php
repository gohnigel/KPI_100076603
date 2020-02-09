@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create Teaching</h1>

            <form action="/teachings" method="post">
                @csrf
                {{-- Name of teaching --}}
                <p class="form-group">
                    <label for="name">Teaching name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        maxlength="255"
                        required>

                    @error('name')
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @enderror
                <p>

                {{-- Teacher of teaching --}}
                <p class="form-group">
                    <label for="teacher">Teaching teacher</label>

                    <input
                        @error('teacher') style="color: red;" @enderror
                        type="text"
                        name="teacher"
                        id="teacher"
                        value="{{ old('teacher') }}"
                        maxlength="255"
                        required>

                    @error('teacher')
                    <span style="color: red;">{{ $errors->first('teacher') }}</span>
                    @enderror
                <p>

                {{-- Subject of supervision --}}
                <p class="form-group">
                    <label for="subject">Teaching subject</label>

                    <input
                        @error('subject') style="color: red;" @enderror
                        type="text"
                        name="subject"
                        id="subject"
                        value="{{ old('subject') }}"
                        maxlength="255"
                        required>

                    @error('subject')
                    <span style="color: red;">{{ $errors->first('subject') }}</span>
                    @enderror
                <p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
