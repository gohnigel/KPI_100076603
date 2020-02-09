@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Supervisions of {{ $user->name }}</h1>
            <a href="/approveSupervisions/{{ $user->id }}/{{ $supervision->id }}/approve"><h2>{{ $supervision->name }}</h2></a>
                <ul>
                    <li>Supervisor: {{ $supervision->supervisor }}</li>
                    <li>Subject: {{ $supervision->subject }}</li>
                </ul>
        </div>
    </div>
</div>
@endsection
