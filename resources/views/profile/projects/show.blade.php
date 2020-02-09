@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Projects</h1>
            <a @if($project->approve == 1) href="/projects/{{ $project->id }}/edit" @endif><h2>{{ $project->title }}</h2></a>
            <ul>
                <li>Start date: {{ date_format(date_create($project->start_date), "d/m/Y") }}</li>
                <li>End date: {{ date_format(date_create($project->end_date), "d/m/Y") }}</li>
                <li>Status: {{ $project->status }}</li>
            </ul>

            @if(is_null($project->approve))<p style="color: red;">Your project is waiting for approval</p> @endif

            <p><a href="/projects/{{ $project->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your project?')) document.getElementById('project-delete-form').submit();">Delete</a></p>

            <form id="project-delete-form" action="/projects/{{ $project->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
