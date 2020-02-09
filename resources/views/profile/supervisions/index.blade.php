@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Supervisions</h1>
            <a href="/supervisions/create"><h2>Add New Supervision</h2></a>
            @foreach ($supervisions as $supervision)
                <ul>
                    <li><a href="/supervisions/{{ $supervision->id }}">{{ $supervision->name }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
