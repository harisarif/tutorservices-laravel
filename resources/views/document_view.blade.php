@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Document Preview</h2>

    @php
        $filePath = public_path($tutor->document);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
    @endphp

    @if(file_exists($filePath))
        @if($extension == 'pdf')
            <iframe src="{{ url($tutor->document) }}" width="100%" height="600px" style="border: none;"></iframe>
        @else
            <a href="{{ url($tutor->document) }}" class="btn btn-primary" target="_blank">
                Download Document
            </a>
        @endif
    @else
        <p style="color: red;">File not found! Please upload a valid document.</p>
    @endif

    <br>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
