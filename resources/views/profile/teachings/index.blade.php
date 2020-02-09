@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Teachings</h1>
            <a href="/teachings/create"><h2>Add New Teaching</h2></a>
            @foreach ($teachings as $teaching)
                <ul>
                    <li><a href="/teachings/{{ $teaching->id }}">{{ $teaching->name }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
