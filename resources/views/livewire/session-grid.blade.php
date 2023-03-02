<div class="conf-step__wrapper">
    <p class="conf-step__paragraph">

        <!-- Button trigger modal -->
        <button type="button" class="conf-step__button conf-step__button-accent mb-4" data-bs-toggle="modal"
                data-bs-target="#addMovie">
            {{ __('Добавить фильм') }}
        </button>
        <!-- Modal -->
        <x-modalAddMovie title="Добавление фильма" id="addMovie" name="Название фильма" value="Добавить">
        </x-modalAddMovie>
    </p>
    <div class="conf-step__movies mb-5">
        @if(isset($films))
            @foreach($films as $film)
                <div class="conf-step__movie">
                    <img class="conf-step__movie-poster" alt="poster" src="admins/i/{{$film->poster}}">
                    <div class="movie_del" data-id="{{ $film->id }}" data-bs-toggle="modal"
                         data-bs-target="#modalDel-{{ $film->id }}"></div>
                    <div class="show_time_add" data-id="{{ $film->id }}" data-bs-toggle="modal"
                         data-bs-target="#addShowTime-{{ $film->id }}"></div>
                    <h3 class="conf-step__movie-title">{{$film->title}}</h3>
                    <p class="conf-step__movie-duration">{{$film->duration}} мин</p>
                    <x-modalAddMovie title="Удаление фильма" id="modalDel-{{ $film->id }}" idFilm="{{ $film->id }}"
                             name="Вы действительно хотите удалить фильм  {{$film->title}}?" value="Удалить">
                    </x-modalAddMovie>
                    <x-modalShowTime title="Добавление сеанса" halls="{{$hallsShow}}" id="addShowTime-{{ $film->id }}"
                                     movieId="{{$film->id }}" timeStart="Время начала" name="Название зала"
                                     value="Добавить">
                    </x-modalShowTime>

                </div>
            @endforeach
        @endif
    </div>
    <div class="hints">Нажмите на плюсик для добавления сеанса*
        <br>Для удаления сеанса нажмите на него в таймлайне*
    </div>

    <div class="conf-step__seances ">
        @foreach($hallsShow as $hall)
            <div class="conf-step__seances-hall">
                <h3 class="conf-step__seances-title">{{$hall->name}}</h3>
                <div class="conf-step__seances-timeline">
                    @foreach($showTimes as $showTime)
                        @if($showTime->hall_id === $hall->id)
                            <div class="conf-step__seances-movie" data-id="{{ $showTime->id }}" data-bs-toggle="modal"
                                 data-bs-target="#showTimeDel-{{ $showTime->id }}"
                                 style="width: {{$duration = $showTime->time_interval/2}}px; background-color: rgb(202, 255, 133);
                                  left:  {{($showTime->time_start->format('H')*60 + $showTime->time_start->format('i'))/2}}px;">
                                <p class="conf-step__seances-movie-title">{{$showTime->film->title}}</p>
                                <p class="conf-step__seances-movie-start">{{$showTime->time_start->format('H:i')}}</p>
                            </div>
                            <x-modalShowTime title="Удаление сеанса" id="showTimeDel-{{ $showTime->id}}"
                                             showId="{{$showTime->id}}" name="Вы действительно хотите удалить сеанс?"
                                             value="Удалить">
                            </x-modalShowTime>
                        @endif
                    @endforeach

                </div>
            </div>
    </div>
    @endforeach

</div>



