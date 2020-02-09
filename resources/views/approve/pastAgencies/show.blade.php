@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Past Agency of {{ $user->name }}</h1>
            <a href="/approvePastAgencies/{{ $user->id }}/{{ $pastAgency->id }}/approve"><h2>{{ $pastAgency->name }}</h2></a>
            <ul>
                <li>Address of past agency: {{ $pastAgency->address }}</li>
            </ul>

        </div>
    </div>
</div>
@endsection
