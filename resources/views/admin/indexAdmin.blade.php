@extends('layouts.baseAdmin')

@section('content')
    <main class="conf-steps">
        <section class="conf-step">
            <header class="conf-step__header conf-step__header_opened">
                <h2 class="conf-step__title">Управление залами</h2>
            </header>
            <div class="conf-step__wrapper">
                <p class="conf-step__paragraph">Доступные залы:</p>
                <ul class="conf-step__list">
                    @foreach ($halls as $hall)
                        <li>{{ $hall->name }}
                            <button data-id="{{ $hall->id }}" class="conf-step__button conf-step__button-trash"
                                    data-bs-toggle="modal" data-bs-target="#modal-{{ $hall->id }}">
                            </button>
                            <x-modalAddHall title="Удаление зала" id="modal-{{ $hall->id }}" route="delete_hall"
                                            name="Вы действительно хотите удалить зал ?" value="Удалить">
                            </x-modalAddHall>
                        </li>
                    @endforeach
                </ul>
                <!-- Button trigger modal -->
                <button type="button" class="conf-step__button conf-step__button-accent" data-bs-toggle="modal"
                        data-bs-target="#addHall">
                    {{ __('Создать зал') }}
                </button>
                <!-- Modal -->
                <x-modalAddHall title="Добавление зала" id="addHall" route="add_hall" name="Название зала"
                                value="Добавить">
                </x-modalAddHall>

            </div>
        </section>

        <section class="conf-step">
            <header class="conf-step__header conf-step__header_opened">
                <h2 class="conf-step__title">Конфигурация залов</h2>
            </header>
            @livewire('registration-places', ['halls' => $halls])
        </section>

        <section class="conf-step">
            <header class="conf-step__header conf-step__header_opened">
                <h2 class="conf-step__title">Конфигурация цен</h2>
            </header>
            @livewire('configure-price', ['halls' => $halls])
        </section>

        <section class="conf-step">
            <header class="conf-step__header conf-step__header_opened">
                <h2 class="conf-step__title">Сетка сеансов</h2>
            </header>
            @livewire('session-grid', ['halls' => $halls])
        </section>
        <section class="conf-step">
            <header class="conf-step__header conf-step__header_opened">
                <h2 class="conf-step__title">Открыть продажи</h2>
            </header>
            <div class="conf-step__wrapper text-center">
                <p class="conf-step__paragraph">Всё готово, теперь можно:</p>

                @if($open_sell->first()->confirmed === 1)
                    <a href="{{route('close_sell')}}">
                        <button class="conf-step__button conf-step__button-accent">Открыть продажу билетов</button>
                    </a>
                @else
                    <a href="{{route('close_sell')}}">
                        <button href="{{route('close_sell')}}" class="conf-step__button conf-step__button-accent">
                            Приостановить продажу билетов
                        </button>
                    </a>
                @endif

            </div>
        </section>
    </main>
@endsection()
