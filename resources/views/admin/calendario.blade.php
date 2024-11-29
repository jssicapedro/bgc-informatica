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
<!-- @vite(['resources/js/app.js', 'resources/css/app.css']) -->
@endpush

@section('main')
<div class="container">
    <h1>Calendário de Serviços</h1>

    <!-- Div onde o calendário será renderizado -->
    <div id="calendar"></div>
</div>
@endsection

<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@3.0.0/dist/fullcalendar.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@3.0.0"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [FullCalendar.dayGrid],
            initialView: 'dayGridMonth',  // Exibe o calendário no modo mensal
            events: @json($entregas),  // Passa os eventos do Laravel para o JS
        });

        calendar.render();
    });
</script>