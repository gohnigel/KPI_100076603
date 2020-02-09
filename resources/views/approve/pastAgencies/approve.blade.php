@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approve Past Agency of {{ $user->name }}</h1>

            <form action="/approvePastAgencies/{{ $user->id }}/{{ $pastAgency->id }}" method="post">
                @csrf
                @method('put')

                {{-- Name of past agency --}}
                <p class="form-group">
                    <label for="name">Past agency name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $pastAgency->name }}"
                        maxlength="255" readonly
                        required>

                    @error('name')
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @enderror
                <p>

                {{-- Address of past agency --}}
                <p class="form-group">
                    <label for="address">Address of past agency</label>

                    <textarea name="address" id="address" cols="20" rows="0" readonly>{{ $pastAgency->address }}</textarea>

                    @error('address')
                    <span style="color: red;">{{ $errors->first('address') }}</span>
                    @enderror
                </p>

                {{-- Approve or reject past agency --}}
                <p class="form-group">
                    <label>Past agency approval</label>
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
