@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Objects</h1>
            <a href="/objectAdmin/create"><h2>Add New Object</h2></a>
            @foreach ($objectAdmins as $objectAdmin)
                <ul>
                    <li><a href="/objectAdmin/{{ $objectAdmin->id }}">{{ $objectAdmin->name }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
