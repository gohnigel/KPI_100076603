@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Community Service</h1>
            <a @if($comSer->approve == 1) href="/comSer/{{ $comSer->id }}/edit" @endif><h2>{{ $comSer->name }}</h2></a>
            <ul>
                <li>Service type: {{ $comSer->type }}</li>
            </ul>

            @if(is_null($comSer->approve))<p style="color: red;">Your consultation is waiting for approval</p> @endif

            <p><a href="/comSer/{{ $comSer->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your community service?')) document.getElementById('comSer-delete-form').submit();">Delete</a></p>

            <form id="comSer-delete-form" action="/comSer/{{ $comSer->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
