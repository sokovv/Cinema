@extends('layouts.baseClient')

@section('content')
    <nav class="page-nav">
        @foreach($period as $per)
            @if($date->dayOfWeek === $loop->iteration)
                <a class="page-nav__day page-nav__day_today page-nav__day_chosen" style="pointer-events: none" href="#">
                    <span class="page-nav__day-week">{{$days[$loop->index]}}</span><span class="page-nav__day-number">{{$per->format('d')}}</span>
                </a>
            @else
                <a class="page-nav__day" style="pointer-events: none" href="#">
                    <span class="page-nav__day-week">{{$days[$loop->index]}}</span><span class="page-nav__day-number">{{$per->format('d')}}</span>
                </a>
            @endif
        @endforeach
    </nav>

    <main>
        @foreach($films as $film)
            <section class="movie">
                <div class="movie__info">
                    <div class="movie__poster">
                        <img class="movie__poster-image" alt="Звёздные войны постер"
                             src="admins/i/{{$film->poster}}">
                    </div>
                    <div class="movie__description">
                        <h2 class="movie__title">{{$film->title}}</h2>
                        <p class="movie__synopsis">{{$film->description}}</p>
                        <p class="movie__data">
                            <span class="movie__data-duration">{{$film->duration}} мин.</span>
                        </p>
                    </div>
                </div>
                @foreach($halls as $hall)
                    <div class="movie-seances__hall">
                        <h3 class="movie-seances__hall-title">{{$hall->name}}</h3>
                        <ul class="movie-seances__list">
                            @foreach($film->showTimes()->get() as $show_time)
                                @if($show_time->hall_id === $hall->id)
                                    <li class="movie-seances__time-block"><a class="movie-seances__time"
                                                                             href="{{route('hall_client',['id' => $show_time->id])}}">{{$show_time->time_start->format('H:i')}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </section>
        @endforeach
    </main>
@endsection()

@section('content_close')
    <nav class="page-nav">
        @foreach($period as $per)
            @if($date->dayOfWeek === $loop->iteration)
                <a class="page-nav__day page-nav__day_today page-nav__day_chosen" style="pointer-events: none" href="#">
                    <span class="page-nav__day-week">{{$days[$loop->index]}}</span><span class="page-nav__day-number">{{$per->format('d')}}</span>
                </a>
            @else
                <a class="page-nav__day" style="pointer-events: none" href="#">
                    <span class="page-nav__day-week">{{$days[$loop->index]}}</span><span class="page-nav__day-number">{{$per->format('d')}}</span>
                </a>
            @endif
        @endforeach
    </nav>

    <main>
     <h1>Продажи билетов закрыты.</h1>
    </main>
@endsection()
