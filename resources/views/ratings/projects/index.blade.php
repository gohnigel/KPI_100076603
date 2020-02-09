@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Projects</h1>
            @forelse ($projects as $project)
                <ul>
                    <li><a href="/ratingsProjects/{{ $user->id }}/{{ $project->id }}">{{ $project->title }}</a></li>
                </ul>
            @empty
                <h2>No projects to rate</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
