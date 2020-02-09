@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Community Service</h1>
            @forelse ($communityService as $comSer)
                <ul>
                    <li><a href="/ratingsComSer/{{ $user->id }}/{{ $comSer->id }}">{{ $comSer->name }}</a></li>
                </ul>
            @empty
                <h2>No community service to rate</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
