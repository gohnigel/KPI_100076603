@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approve Consultation of {{ $user->name }}</h1>

            <form action="/approveConsultations/{{ $user->id }}/{{ $consultation->id }}" method="post">
                @csrf
                @method('put')
                {{-- Name of consultation --}}
                <p class="form-group">
                    <label for="name">Consultation name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $consultation->name }}"
                        maxlength="255"
                        readonly
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
                        value="{{ $consultation->consultant }}"
                        maxlength="255"
                        readonly
                        required>

                    @error('consultant')
                    <span style="color: red;">{{ $errors->first('consultant') }}</span>
                    @enderror
                <p>

                {{-- Approve or reject consultation --}}
                <p class="form-group">
                    <label>Consultation approval</label>
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
