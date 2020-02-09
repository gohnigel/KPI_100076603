@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Consultations of {{ $user->name }}</h1>
            @forelse ($consultations as $consultation)
            <ul>
                <li><a href="/approveConsultations/{{ $user->id }}/{{ $consultation->id }}">{{ $consultation->name }}</a>
            </ul>
            @empty
                <h2>No consultation to approve</h2>
            @endforelse
        </div>
    </div>
</div>
@endsection
