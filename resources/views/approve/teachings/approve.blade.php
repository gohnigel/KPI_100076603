@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approve Teaching of {{ $user->name }}</h1>

            <form action="/approveTeachings/{{ $user->id }}/{{ $teaching->id }}" method="post">
                @csrf
                @method('put')
                {{-- Name of teaching --}}
                <p class="form-group">
                    <label for="name">Teaching name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $teaching->name }}"
                        maxlength="255"
                        readonly
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
                        value="{{ $teaching->teacher }}"
                        maxlength="255"
                        readonly
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
                        value="{{ $teaching->subject }}"
                        maxlength="255"
                        readonly
                        required>

                    @error('subject')
                    <span style="color: red;">{{ $errors->first('subject') }}</span>
                    @enderror
                <p>

                {{-- Approve or reject teaching --}}
                <p class="form-group">
                    <label>Teaching approval</label>
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
