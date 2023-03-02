@extends('layouts.baseClient')

@section('content')

    <section class="ticket">
        <header class="tichet__check">
            <h2 class="ticket__check-title">Вы выбрали билеты:</h2>
        </header>

        <div class="ticket__info-wrapper">
            <p class="ticket__info">На фильм: <span
                    class="ticket__details ticket__title">{{$tickets->first()->title}}</span></p>
            <p class="ticket__info">Места:
                @foreach($tickets as $ticket)
                    <span class="ticket__details ticket__chairs">Ряд:{{$ticket->row}} Место:{{$ticket->place}}|</span>
            @endforeach
            </p>
            <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{$show_time->hall->name}}</span>
            </p>
            <p class="ticket__info">Начало сеанса: <span
                    class="ticket__details ticket__start">{{$show_time->time_start->format('H:i')}}</span></p>
            <p class="ticket__info">Стоимость: <span class="ticket__details ticket__cost">{{$sum}}</span> рублей</p>
            <a class="acceptin-button" href="{{ route('ticket', ['id' => $show_time->id])}}" style="width: min-content; text-decoration: none">Получить код бронирования</a>
            <p class="ticket__hint">После оплаты билет будет доступен в этом окне. Покажите QR-код нашему контроллёру у входа в зал.</p>
            <p class="ticket__hint">Приятного просмотра!</p>
        </div>
    </section>
@endsection()
