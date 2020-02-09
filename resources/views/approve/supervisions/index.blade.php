@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Supervisions of {{ $user->name }}</h1>
            @forelse ($supervisions as $supervision)
                <ul>
                    <li><a href="/approveSupervisions/{{ $user->id }}/{{ $supervision->id }}">{{ $supervision->name }}</a></li>
                </ul>
            @empty
                <h2>No supervision to approve</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
