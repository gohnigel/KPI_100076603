@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Projects of {{ $user->name }}</h1>
            @forelse ($projects as $project)
                <ul>
                    <li><a href="/approveProjects/{{ $user->id }}/{{ $project->id }}">{{ $project->title }}</a></li>
                </ul>
            @empty
                <h2>No projects to approve</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
