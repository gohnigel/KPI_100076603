@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Supervision</h1>
            @forelse ($supervisions as $supervision)
                <ul>
                    <li><a href="/ratingsSupervisions/{{ $user->id }}/{{ $supervision->id }}">{{ $supervision->name }}</a></li>
                </ul>
            @empty
                <h2>No supervision to rate</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
