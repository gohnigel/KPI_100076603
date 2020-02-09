@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approve Supervision of {{ $user->name }}</h1>

            <form action="/approveSupervisions/{{ $user->id}}/{{ $supervision->id }}" method="post">
                @csrf
                @method('put')

                {{-- Name of supervision --}}
                <p class="form-group">
                    <label for="name">Supervision name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $supervision->name }}"
                        maxlength="255"
                        readonly
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
                        value="{{ $supervision->supervisor }}"
                        maxlength="255"
                        readonly
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
                        value="{{ $supervision->subject }}"
                        maxlength="255"
                        readonly
                        required>

                    @error('subject')
                    <span style="color: red;">{{ $errors->first('subject') }}</span>
                    @enderror
                <p>

                {{-- Approve or reject supervision --}}
                <p class="form-group">
                    <label>Supervision approval</label>
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
