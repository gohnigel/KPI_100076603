@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create Object</h1>

            <form action="/objectAdmin" method="post">
                @csrf
                {{-- Name of object --}}
                <p class="form-group">
                    <label for="name">Object name</label>

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

                {{-- Type of object --}}
                <p class="form-group">
                    <label for="type">Type of object</label>

                    <select name="type" id="type" required>
                        <option value="Agency">Agency</option>
                        <option value="Student">Student</option>
                        <option value="Subject">Subject</option>
                        <option value="Grant">Grant</option>
                        <option value="Object cluster">Object cluster</option>
                    </select>

                    @error('type')
                    <span style="color: red;">{{ $errors->first('type') }}</span>
                    @enderror
                </p>

                {{-- Enable or disable object --}}
                <p class="form-group">
                    <label>Enabling or disabling of object</label>

                    <input
                        @error('enable') style="color: red;" @enderror
                        type="radio"
                        name="enable"
                        id="enable"
                        maxlength="255"
                        value="0"
                        required>
                    <label for="enable">Enabled</label>

                    <input
                        @error('enable') style="color: red;" @enderror
                        type="radio"
                        name="enable"
                        id="disable"
                        maxlength="255"
                        value="1"
                        required>
                    <label for="disable">Disabled</label>

                    @error('enable')
                    <span style="color: red;">{{ $errors->first('enable') }}</span>
                    @enderror
                </p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
