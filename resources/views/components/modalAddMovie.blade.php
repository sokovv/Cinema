<div wire:ignore.self class="modal fade" id={{$id}}  tabindex="-1" aria-labelledby="ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="popup__header">
                <h2 class="popup__title">
                    {{ $title }}
                    <a class="popup__dismiss" data-bs-dismiss="modal" href="#"><img src="admins/i/close.png"
                                                                                    alt="Закрыть"></a>
                </h2>
            </div>
            <div class="popup__wrapper">
                <form wire:submit.prevent="submit" method="post" accept-charset="utf-8">
                    @csrf
                    <label class="conf-step__label conf-step__label-fullsize" for="name">
                        <h4>{{ $name }}</h4>
                        @if($title==="Добавление фильма")
                            <input wire:model="title" class="conf-step__input mb-4" type="text"
                                   placeholder="Например, &laquo;Начало&raquo;" name="name"
                                   required>
                            {{ __('Описание') }}
                            <input wire:model="description" class="conf-step__input mb-4" type="text"
                                   name="name"
                                   required>
                            {{ __('Продолжительность, мин.') }}
                            <input wire:model="duration" class="conf-step__input  mb-4" type="text"
                                   placeholder="Например, &laquo;120&raquo;" name="name" required>
                            {{ __('Название постера') }}
                            <input wire:model="poster" class="conf-step__input" type="text"
                                   placeholder="Например, &laquo;poster.png&raquo;" name="name" required>
                        @endif
                    </label>
                    <div class="conf-step__buttons text-center">
                        @if($title==="Удаление фильма" && isset($idFilm))
                            <input wire:click="deleteFilm({{$idFilm}})" type="button"
                                   value='{{ $value }}' class="conf-step__button-accent
                                               conf-step__button" data-bs-dismiss="modal">
                        @else
                            <input type="submit" value={{ $value }} class="conf-step__button-accent
                                   conf-step__button" data-bs-dismiss="modal">
                        @endif
                        <button type="button" class="conf-step__button conf-step__button-regular"
                                data-bs-dismiss="modal">  {{ __('Отменить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
