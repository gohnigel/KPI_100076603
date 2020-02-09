@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Consultation of {{ $user->name}}</h1>
            <a href="/approveConsultations/{{ $user->id }}/{{ $consultation->id }}/approve"><h2>{{ $consultation->name }}</h2></a>
            <ul>
                <li>Consultant: {{ $consultation->consultant }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
