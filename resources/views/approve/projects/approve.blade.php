@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approve Project of {{ $user->name }}</h1>

            <form action="/approveProjects/{{ $user->id }}/{{ $project->id }}" method="post">
                @csrf
                @method('put')
                {{-- Title of project --}}
                <p class="form-group">
                    <label for="title">Project title</label>

                    <input
                        @error('title') style="color: red;" @enderror
                        type="text"
                        name="title"
                        id="title"
                        value="{{ $project->title }}"
                        maxlength="255"
                        readonly
                        required>

                    @error('title')
                    <span style="color: red;">{{ $errors->first('title') }}</span>
                    @enderror
                <p>

                {{-- Start date of project --}}
                <p class="form-group">
                    <label for="start_date">Start date</label>

                    <input
                        @error('start_date') style="color: red;" @enderror
                        type="date"
                        name="start_date"
                        id="start_date"
                        value="{{ $project->start_date }}"
                        readonly
                        required>

                    @error('start_date')
                    <span style="color: red;">{{ $errors->first('start_date') }}</span>
                    @enderror
                </p>

                {{-- End date of project --}}
                <p class="form-group">
                    <label for="end-date">End date</label>

                    <input
                        @error('end_date') style="color: red;" @enderror
                        type="date"
                        name="end_date"
                        id="end_date"
                        value="{{ $project->end_date }}"
                        readonly
                        required>

                    @error('end_date')
                    <span style="color: red;">{{ $errors->first('end_date') }}</span>
                    @enderror
                </p>

                {{-- Status of project --}}
                <p>
                    <label for="status">Status</label>
                    <input
                        @error('status') style="color: red;" @enderror
                        type="text"
                        name="status"
                        id="status"
                        value="{{ $project->status }}"
                        readonly
                        required>

                    @error('status')
                    <span style="color: red;">{{ $errors->first('status') }}</span>
                    @enderror
                </p>

                {{-- Approve or reject project --}}
                <p class="form-group">
                    <label>Project approval</label>
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
