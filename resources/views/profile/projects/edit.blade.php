@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Project</h1>

            <form action="/projects/{{ $project->id }}" method="post">
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
                        required>

                    @error('end_date')
                    <span style="color: red;">{{ $errors->first('end_date') }}</span>
                    @enderror
                </p>

                {{-- Status of project --}}
                <p>
                    <label for="status">Status</label>
                    <select name="status" id="status" required>
                        <option value="Completed" @if($project->status == "Completed") selected @endif>Completed</option>
                        <option value="Not completed" @if($project->status == "Not completed") selected @endif>Not completed</option>
                    </select>

                    @error('status')
                    <span style="color: red;">{{ $errors->first('status') }}</span>
                    @enderror
                </p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
