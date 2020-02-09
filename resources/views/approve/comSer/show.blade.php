@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Community Service of {{ $user->name }}</h1>
            <a href="/approveComSer/{{ $user->id }}/{{ $comSer->id }}/approve"><h2>{{ $comSer->name }}</h2></a>
            <ul>
                <li>Service type: {{ $comSer->type }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
