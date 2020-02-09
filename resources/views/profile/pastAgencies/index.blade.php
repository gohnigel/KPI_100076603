@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Past Agencies</h1>
            <a href="/pastAgencies/create"><h2>Add New Past Agency</h2></a>
            @foreach ($pastAgencies as $pastAgency)
                <ul>
                    <li><a href="/pastAgencies/{{ $pastAgency->id }}">{{ $pastAgency->name }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
