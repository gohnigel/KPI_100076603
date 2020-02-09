@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Community Service</h1>
            <a href="/comSer/create"><h2>Add New Community Service</h2></a>
            @foreach ($communityService as $comSer)
                <ul>
                    <li><a href="/comSer/{{ $comSer->id }}">{{ $comSer->name }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
