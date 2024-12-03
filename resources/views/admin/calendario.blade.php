@extends('layout.layout')

@section('title', 'Calendário de Serviços')

@push('links')
<link rel="stylesheet" href="{{ asset('css/calendario.css') }}">
<!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.min.css" rel="stylesheet">
@endpush

@section('main')
<div class="container calendario">
    <h1>Calendário de Serviços</h1>

    <!-- Div onde o calendário será renderizado -->
    <div id="calendar"></div>

</div>
@endsection

@push('scripts')
<!-- FullCalendar JS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'pt',
            events: @json($events), // Passa os eventos para o FullCalendar

            eventContent: function(arg) {
                // O título do evento já foi formatado no controller
                var title = arg.event.title;

                // Retorna o HTML com o título
                return {
                    html: `<div class="fc-event-title">${title}</div>`
                };
            },

            eventClick: function(info) {
                // Obtém o ID do evento, que corresponde ao ID do RMA
                var eventId = info.event.id;

                // Redireciona para a view do RMA correspondente
                window.location.href = '/reparacoes/' + eventId; // Ajuste o URL conforme sua rota
            },

            eventDidMount: function(info) {
                // Exibe a descrição no tooltip ao passar o mouse sobre o evento
                var description = info.event.extendedProps.description;
                if (description) {
                    info.el.setAttribute('title', description); // Tooltip com a descrição
                }
            }
        });

        calendar.render(); // Renderiza o calendário
    });
</script>
@endpush