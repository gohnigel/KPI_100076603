@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Teachings</h1>
            @forelse ($teachings as $teaching)
                <ul>
                    <li><a href="/ratingsTeachings/{{ $user->id }}/{{ $teaching->id }}">{{ $teaching->name }}</a></li>
                </ul>
            @empty
                <h2>No teaching to rate</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
