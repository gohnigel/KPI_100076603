@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Approval of Users' Profiles</h1>
            @foreach ($users as $user)
            <ul>
                <li><a href="/approve/{{ $user->id }}">{{ $user->name }}</a></li>
            </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
