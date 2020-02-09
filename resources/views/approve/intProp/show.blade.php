@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Intellectual Property of {{ $user->name }}</h1>
            <a href="/approveIntProp/{{ $user->id }}/{{ $intProp->id }}/approve"><h2>{{ $intProp->name }}</h2></a>
            <ul>
                <li>Type: {{ $intProp->type }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
