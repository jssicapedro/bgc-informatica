@extends('layout.layout')

@section('title', 'BGCInformatica')

<!-- css -->
@push('links')
<!-- FullCalendar -->
<link href="{{ asset('node_modules/@fullcalendar/daygrid/dist/main.css') }}" rel="stylesheet">
<link href="{{ asset('node_modules/@fullcalendar/timegrid/dist/main.css') }}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endpush

<!-- js -->
@push('scripts')
@vite(['resources/js/app.js', 'resources/css/app.css'])
@endpush

@section('main')
<div class="container">
    <h1>Calendário de Serviços</h1>
    
    <!-- Div onde o calendário será renderizado -->
    <div id="calendar"></div>
</div>
@endsection