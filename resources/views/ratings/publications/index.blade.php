@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Publications</h1>
            @forelse ($publications as $publication)
                <ul>
                    <li><a href="/ratingsPublications/{{ $user->id }}/{{ $publication->id }}">{{ $publication->title }}</a></li>
                </ul>
            @empty
                <h2>No publication to rate</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
