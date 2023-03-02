@extends('layouts.baseClient')

@section('content')
    <section class="buying">
        <div class="buying__info">
            <div class="buying__info-description">
                <h2 class="buying__info-title">{{$show_time->film->title}}</h2>
                <p class="buying__info-start">Начало сеанса: {{$show_time->time_start->format('H:i')}}</p>
                <p class="buying__info-hall">{{$show_time->hall->name}}</p>
            </div>
        </div>
        @livewire('choose-place', ['show_time' => $show_time])

    </section>
@endsection()
