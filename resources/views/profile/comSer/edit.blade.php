@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Community Service</h1>

            <form action="/comSer/{{ $comSer->id }}" method="post">
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
                        required>

                    @error('name')
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @enderror
                <p>

                {{-- Type of community service --}}
                <p class="form-group">
                    <label for="type">Type of community service</label>

                    <select name="type" id="type" required>
                        <option value="Cleaning" @if($comSer->type == "Cleaning") selected @endif>Cleaning</option>
                        <option value="Donation" @if($comSer->type == "Donation") selected @endif>Donation</option>
                        <option value="Marathon" @if($comSer->type == "Marathon") selected @endif>Marathon</option>
                    </select>

                    @error('type')
                    <span style="color: red;">{{ $errors->first('type') }}</span>
                    @enderror
                </p>

                {{-- Submit and reset button --}}
                <p><input type="submit" class="button"> <input type="reset" class="button"></p>

            </form>
        </div>
    </div>
</div>
@endsection
