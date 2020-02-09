@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create Object</h1>

            <form action="/objectAdmin/{{ $objectAdmin->id }}" method="post">
                @csrf
                @method('put')
                {{-- Name of object --}}
                <p class="form-group">
                    <label for="name">Object name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $objectAdmin->name }}"
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
                        <option value="Agency" @if($objectAdmin->type == "Agency") selected @endif>Agency</option>
                        <option value="Student" @if($objectAdmin->type == "Student") selected @endif>Student</option>
                        <option value="Subject" @if($objectAdmin->type == "Subject") selected @endif>Subject</option>
                        <option value="Grant" @if($objectAdmin->type == "Grant") selected @endif>Grant</option>
                        <option value="Object cluster" @if($objectAdmin->type == "Object cluster") selected @endif>Object cluster</option>
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
                        @if($objectAdmin->enable == "0") checked @endif
                        required>
                    <label for="enable">Enabled</label>

                    <input
                        @error('enable') style="color: red;" @enderror
                        type="radio"
                        name="enable"
                        id="disable"
                        maxlength="255"
                        value="1"
                        @if($objectAdmin->enable == "1") checked @endif
                        required>
                    <label for="disable">Disabled</label>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
