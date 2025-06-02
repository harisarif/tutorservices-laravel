@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Notification Detail</h2>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $notification->data['title'] ?? 'Notification' }}</h5>
            <p class="card-text">{{ $notification->data['message'] ?? 'No message available.' }}</p>
            <small class="text-muted">Received: {{ $notification->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
@endsection
