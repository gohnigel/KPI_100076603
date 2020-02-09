@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create Consultation</h1>

            <form action="/consultations" method="post">
                @csrf
                {{-- Name of consultation --}}
                <p class="form-group">
                    <label for="name">Consultation name</label>

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
                    <label for="consultant">Consultation consultant</label>

                    <input
                        @error('consultant') style="color: red;" @enderror
                        type="text"
                        name="consultant"
                        id="consultant"
                        value="{{ old('consultant') }}"
                        maxlength="255"
                        required>

                    @error('consultant')
                    <span style="color: red;">{{ $errors->first('consultant') }}</span>
                    @enderror
                <p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
