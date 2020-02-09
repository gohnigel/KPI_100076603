@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Community Service of {{ $user->name }}</h1>
            @forelse ($communityService as $comSer)
            <ul>
                <li><a href="/approveComSer/{{ $user->id }}/{{ $comSer->id }}">{{ $comSer->name }}</a>
            </ul>
            @empty
            <h2>No community service to approve</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
