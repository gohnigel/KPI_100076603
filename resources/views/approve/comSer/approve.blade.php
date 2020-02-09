@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approve Community Service</h1>

            <form action="/approveComSer/{{ $user->id }}/{{ $comSer->id }}" method="post">
                @csrf
                @method('put')
                {{-- Name of community service --}}
                <p class="form-group">
                    <label for="name">Community service name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $comSer->name }}"
                        maxlength="255"
                        readonly
                        required>

                    @error('name')
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @enderror
                <p>

                {{-- Type of community service --}}
                <p class="form-group">
                    <label for="type">Type of community service</label>

                    <input
                        @error('type') style="color: red;" @enderror
                        type="text"
                        name="type"
                        id="type"
                        value="{{ $comSer->type }}"
                        maxlength="255"
                        readonly
                        required>

                    @error('type')
                    <span style="color: red;">{{ $errors->first('type') }}</span>
                    @enderror
                </p>

                {{-- Approve or reject community service --}}
                <p class="form-group">
                    <label>Community service approval</label>
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
