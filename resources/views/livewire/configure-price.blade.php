<div class="conf-step__wrapper">
    <p class="conf-step__paragraph">Выберите зал для конфигурации:</p>
    <ul class="conf-step__selectors-box">
        @foreach ($halls as $hall)
            <li><input wire:click="configHall({{ $hall->id }})" id="{{$hall->id}}" type="radio" class="conf-step__radio" name="chairs-hall"
                       value="{{$hall->name}}"
                ><span
                    class="conf-step__selector">{{$hall->name}}</span></li>
        @endforeach

    </ul>

    <p class="conf-step__paragraph">Установите цены для типов кресел:</p>
    <div class="conf-step__legend">
        <label class="conf-step__label">Цена, рублей<input type="text" class="conf-step__input"
                                                           wire:model="priceStandart" ></label>
        за <span class="conf-step__chair conf-step__chair_standart"></span> обычные кресла
    </div>
    <div class="conf-step__legend">
        <label class="conf-step__label">Цена, рублей<input type="text" class="conf-step__input"
                                                           wire:model="priceVip" ></label>
        за <span class="conf-step__chair conf-step__chair_vip"></span> VIP кресла
    </div>

    <fieldset class="conf-step__buttons text-center">
        <button wire:click="clear" class="conf-step__button conf-step__button-regular">Очистить цены</button>
        <input wire:click="save" type="button" value="Сохранить" class="conf-step__button conf-step__button-accent">
    </fieldset>
    <div class="hints" style="margin-top: 50px ; margin-bottom: 0px">После установки цены, каждый зал нужно сохранить отдельно*
    </div>
</div>

