@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Consultations</h1>
            <a href="/consultations/create"><h2>Add New Consultation</h2></a>
            @foreach ($consultations as $consultation)
                <ul>
                    <li><a href="/consultations/{{ $consultation->id }}">{{ $consultation->name }}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
