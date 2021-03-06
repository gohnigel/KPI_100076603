@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create Intellectual Property</h1>

            <form action="/intProp" method="post">
                @csrf
                {{-- Name of intellectual property --}}
                <p class="form-group">
                    <label for="name">Intellectual Property name</label>

                    <input
                        @error('name') style="color: red;" @enderror
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        maxlength="255"
                        required>

                    @error('name')
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    @enderror
                <p>

                {{-- Type of intellectual property --}}
                <p class="form-group">
                    <label for="type">Type of intellectual property</label>

                    <select name="type" id="type" required>
                        <option value="Patent">Patent</option>
                        <option value="Trademark">Trademark</option>
                        <option value="Trade secret">Trade secret</option>
                        <option value="Copyright">Copyright</option>
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
