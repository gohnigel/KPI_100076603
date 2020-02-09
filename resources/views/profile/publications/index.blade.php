@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Publications</h1>
            <a href="/publications/create"><h2>Add New Publication</h2></a>
            @foreach ($publications as $publication)
                <ul>
                    <li><a href="/publications/{{ $publication->id }}">{{ $publication->title }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
