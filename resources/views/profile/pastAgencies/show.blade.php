@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Past Agency</h1>
            <a @if($pastAgency->approve == 1) href="/pastAgencies/{{ $pastAgency->id }}/edit" @endif><h2>{{ $pastAgency->name }}</h2></a>
            <ul>
                <li>Address of past agency: {{ $pastAgency->address }}</li>
            </ul>

            @if(is_null($pastAgency->approve))<p style="color: red;">Your consultation is waiting for approval</p> @endif

            <p><a href="/pastAgencies/{{ $pastAgency->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your past agency?')) document.getElementById('pastAgency-delete-form').submit();">Delete</a></p>

            <form id="pastAgency-delete-form" action="/pastAgencies/{{ $pastAgency->id }}" method="POST" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
