@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Intellectual Property</h1>
            <a href="/intProp/create"><h2>Add New Intellectual Property</h2></a>
            @foreach ($intellectualProperty as $intProp)
                <ul>
                    <li><a href="/intProp/{{ $intProp->id }}">{{ $intProp->name }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
