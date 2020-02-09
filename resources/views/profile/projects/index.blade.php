@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Projects</h1>
            <a href="/projects/create"><h2>Add New Project</h2></a>
            @foreach ($projects as $project)
                <ul>
                    <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
