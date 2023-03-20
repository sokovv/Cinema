<div wire:ignore.self class="modal fade " id={{$id}}  tabindex="-1" aria-labelledby="ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="popup__header">
                <h2 class="popup__title">
                    {{$title}}
                    <a class="popup__dismiss" data-bs-dismiss="modal" href="#"><img src="admins/i/close.png"
                                                                                    alt="Закрыть"></a>
                </h2>
            </div>
            <div class="popup__wrapper">
                @if(isset($movieId))
                    <form wire:submit.prevent="submitShowTime( {{$movieId}} )" method="GET" accept-charset="utf-8">

                        @csrf
                        <label class="conf-step__label conf-step__label-fullsize" for="hall">
                           <h4>{{$name}}</h4>
                            <select wire:model="hall" class="conf-step__input" name="hall" required>
                                <option value="" selected hidden>выберите зал...
                                </option>
                                @foreach(json_decode(str_replace('&quot;', '"', $halls)) as $hall)
                                    <option value="{{$hall->id}}">{{$hall->name}}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label class="conf-step__label conf-step__label-fullsize" for="name">
                           <h4> {{$timeStart}}</h4>
                            <input wire:model="startTime" class="conf-step__input" type="time" value="00:00"
                                   name="startTime" required>
                        </label>
                        <div class="conf-step__buttons text-center">
                            <input type="submit" data-bs-dismiss="modal" value='Добавить'
                                   class="conf-step__button conf-step__button-accent">
                            @else()

                                <div class="conf-step__buttons text-center">
                                    <h4>{{ $name }}</h4>
                                    <input wire:click="showTimeDel({{$showId}})" type="button" data-bs-dismiss="modal" value='Удалить'
                                           class="conf-step__button conf-step__button-accent">
                                    @endif
                                    <button data-bs-dismiss="modal" class="conf-step__button conf-step__button-regular">
                                        Отменить
                                    </button>
                                </div>
                    </form>
            </div>
        </div>
    </div>
</div>
