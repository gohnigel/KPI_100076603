@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Past Agency</h1>

            <form action="/pastAgencies/{{ $pastAgency->id }}" method="post">
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
                        maxlength="255"
                        required>

                    @error('name')
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @enderror
                <p>

                {{-- Address of past agency --}}
                <p class="form-group">
                    <label for="address">Address of past agency</label>

                    <textarea name="address" id="address" cols="20" rows="0">{{ $pastAgency->address }}</textarea>

                    @error('address')
                    <span style="color: red;">{{ $errors->first('address') }}</span>
                    @enderror
                </p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
