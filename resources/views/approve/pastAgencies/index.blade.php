@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Past Agencies of {{ $user->name }}</h1>
            @forelse ($pastAgencies as $pastAgency)
                <ul>
                    <li><a href="/approvePastAgencies/{{ $user->id }}/{{ $pastAgency->id }}">{{ $pastAgency->name }}</a></li>
                </ul>
            @empty
                <h2>No past agency to approve</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
