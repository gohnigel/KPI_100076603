@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Projects of {{ $user->name }}</h1>
            <a href="/approveProjects/{{ $user->id }}/{{ $project->id }}/approve"><h2>{{ $project->title }}</h2></a>
                <ul>
                    <li>Start date: {{ date_format(date_create($project->start_date), "d/m/Y") }}</li>
                    <li>End date: {{ date_format(date_create($project->end_date), "d/m/Y") }}</li>
                    <li>Status: {{ $project->status }}</li>
                </ul>
        </div>
    </div>
</div>
@endsection
