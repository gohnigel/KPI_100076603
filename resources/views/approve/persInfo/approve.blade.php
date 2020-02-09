@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approve Personal Information of {{ $user->name }}</h1>

                <form action="/approvePersInfo/{{ $user->id }}/{{ $persInfo->id }}" method="post">
                @csrf
                @method('put')
                {{-- Name of user --}}
                <p class="form-group">
                    <label for="name">Name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $persInfo->name }}"
                        maxlength="255"
                        readonly
                        required>

                    @error('name')
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @enderror
                <p>

                {{-- Date of birth of user --}}
                <p class="form-group">
                    <label for="dob">Date of birth</label>

                    <input
                        @error('dob') style="color: red;" @enderror
                        type="date"
                        name="dob"
                        id="dob"
                        value="{{ $persInfo->dob }}"
                        max="{{ date('Y-m-d') }}"
                        readonly
                        required>

                    @error('dob')
                    <span style="color: red;">{{ $errors->first('dob') }}</span>
                    @enderror
                </p>

                {{-- Gender of user --}}
                <p class="form-group">
                    <label for="gender">Gender</label>
                        <input
                            @error('gender') style="color: red;" @enderror
                            type="text"
                            name="gender"
                            id="gender"
                            value="{{ $persInfo->gender }}"
                            readonly
                            required>

                        @error('gender')
                        <span style="color: red;">{{ $errors->first('gender') }}</span>
                        @enderror
                </p>

                {{-- Address of user --}}
                <p>
                    <label for="address">Address</label>
                    <textarea @error('address') style="color: red;" @enderror name="address" id="address" cols="30" rows="" readonly>{{ $persInfo->address }}</textarea>

                    @error('address')
                    <span style="color: red;">{{ $errors->first('address') }}</span>
                    @enderror
                </p>

                {{-- Phone number of user --}}
                <p>
                    <label for="phone">Phone number</label>
                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="phone"
                        id="phone"
                        value="{{ $persInfo->phone }}"
                        pattern="[0-9]{10,}"
                        maxlength="255"
                        oninvalid="setCustomValidity('At least 10 digits has to be filled in')"
                        oninput="setCustomValidity('')"
                        readonly
                        required>

                    @error('phone')
                    <span style="color: red;">{{ $errors->first('phone') }}</span>
                    @enderror
                </p>

                {{-- Approve or reject personal information --}}
                <p class="form-group">
                    <label>Personal information approval</label>
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
