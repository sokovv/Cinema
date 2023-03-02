<div class="conf-step__wrapper">
    <form method="GET" wire:submit.prevent="submit">
        @csrf
        <p class="conf-step__paragraph">Выберите зал для конфигурации:</p>
        <ul class="conf-step__selectors-box">
            @foreach ($halls as $hall)
                @if($hall->name === $name)
                    <li><input wire:click="configHall" id="{{$hall->id}}" type="radio" class="conf-step__radio"
                               name="chairs-hall"
                               wire:model="name"
                               value="{{$hall->name}}"
                               checked><span
                            class="conf-step__selector">{{$hall->name}}</span></li>
                @else
                    <li><input wire:click="configHall" id="{{$hall->id}}" type="radio" class="conf-step__radio"
                               name="chairs-hall"
                               wire:model="name"
                               value="{{$hall->name}}"
                        ><span
                            class="conf-step__selector">{{$hall->name}}</span></li>
                @endif

            @endforeach
        </ul>
        <p class="conf-step__paragraph">Укажите количество рядов и максимальное количество кресел в
            ряду:</p>
        <div class="conf-step__legend">
            <label class="conf-step__label">Рядов, шт<input wire:model="rows" name="rows" type="text"
                                                            class="conf-step__input"
                ></label>
            <span class=" multiplier">x</span>
            <label class="conf-step__label">Мест, шт<input wire:model="places" name="places" type="text"
                                                           class="conf-step__input"></label>
            <label class="conf-step__label"> <input type="submit" value="Создать(изменить) места"
                                                    class="conf-step__button conf-step__button-accent ms-3"></label>
        </div>
        <p class="conf-step__paragraph">Теперь вы можете указать типы кресел на схеме зала:</p>
        <div class="conf-step__legend">
            <span class="conf-step__chair conf-step__chair_standart"></span> — обычные кресла
            <span class="conf-step__chair conf-step__chair_vip"></span> — VIP кресла
            <span class="conf-step__chair conf-step__chair_disabled"></span> — заблокированные (нет кресла)
            <p class="conf-step__hint">Чтобы изменить вид кресла, нажмите по нему левой кнопкой мыши</p>
        </div>

        <div class="conf-step__hall">
            <div class="conf-step__hall-wrapper">
                @if($columns === 0)
                    <p class="conf-step__paragraph">Создайте места</p>
                @elseif( isset($columns, $placesNew) )
                    @foreach ($placesNew->chunk($columns) as $chunk)
                        <div class="conf-step__row">
                            @foreach ($chunk as $place)
                                <span id="{{$place->id}}" wire:click="typePlace({{ $place->id }})"
                                      class="conf-step__chair conf-step__chair_{{$place->type}}"></span>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <p class="conf-step__paragraph">Конфигурация зала не выбрана. Выберите зал.</p>
                @endif
            </div>
        </div>
        <fieldset class="conf-step__buttons text-center">
            <button class="conf-step__button conf-step__button-regular">Вернуть обычные кресла</button>
        </fieldset>
    </form>
</div>
