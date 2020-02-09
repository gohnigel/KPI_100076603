@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Intellectual Property of {{ $user->name }}</h1>
            @forelse ($intellectualProperty as $intProp)
                <ul>
                    <li><a href="/approveIntProp/{{ $user->id }}/{{ $intProp->id }}">{{ $intProp->name }}</a>
                </ul>
            @empty
                <h2>No intellectual property to approve</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
