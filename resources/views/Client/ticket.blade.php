@extends('layouts.baseClient')

@section('content')
    <section class="ticket">

        <header class="tichet__check">
            <h2 class="ticket__check-title">Электронный билет</h2>
        </header>

        <div class="ticket__info-wrapper">
            <p class="ticket__info">На фильм: <span
                    class="ticket__details ticket__title">{{$show_time->film->title}}</span></p>
            <p class="ticket__info">Места:
                @foreach($tickets as $ticket)
                    <span class="ticket__details ticket__chairs">Ряд:{{$ticket->row}} Место:{{$ticket->place}}|</span>
                @endforeach
            </p>
            <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{$show_time->hall->name}}</span>
            </p>
            <p class="ticket__info">Начало сеанса: <span
                    class="ticket__details ticket__start">{{$show_time->time_start->format('H:i')}}</span></p>
            @if($text !== null)
                {{ QrCode::generate($text)}}
            @else
                <script>window.location = "/";</script>
            @endif

            <p class="ticket__hint">Обязательно сохраните QR-код перед обновлением страницы.</p>
            <p class="ticket__hint">Покажите QR-код нашему контроллеру для подтверждения бронирования.</p>
            <p class="ticket__hint">Приятного просмотра!</p>
        </div>
    </section>
@endsection()
