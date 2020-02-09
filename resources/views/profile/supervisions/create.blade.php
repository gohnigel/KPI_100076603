@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create Supervision</h1>

            <form action="/supervisions" method="post">
                @csrf
                {{-- Name of supervision --}}
                <p class="form-group">
                    <label for="name">Supervision name</label>

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

                {{-- Supervisor of supervision --}}
                <p class="form-group">
                    <label for="supervisor">Supervision supervisor</label>

                    <input
                        @error('supervisor') style="color: red;" @enderror
                        type="text"
                        name="supervisor"
                        id="supervisor"
                        value="{{ old('supervisor') }}"
                        maxlength="255"
                        required>

                    @error('supervisor')
                    <span style="color: red;">{{ $errors->first('supervisor') }}</span>
                    @enderror
                <p>

                {{-- Subject of supervision --}}
                <p class="form-group">
                    <label for="subject">Supervision subject</label>

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
