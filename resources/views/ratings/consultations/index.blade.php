@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Consultations</h1>
            @forelse ($consultations as $consultation)
                <ul>
                    <li><a href="/ratingsConsultations/{{ $user->id }}/{{ $consultation->id }}">{{ $consultation->name }}</a></li>
                </ul>
            @empty
                <h2>No consultation to rate</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
