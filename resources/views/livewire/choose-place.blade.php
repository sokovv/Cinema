<div class="buying-scheme">
    <div class="buying-scheme__wrapper">
        @foreach ($show_time->hall->places()->get()->chunk($show_time->hall->places) as $chunk)
            {{$number_row=$loop->iteration}}
            <div class="buying-scheme__row">
                @foreach ($chunk as $place)
                    {{$number_place=$loop->iteration}}
                    @if(in_array($place->id, $takenIdArr))
                        <span id="{{$place->id}}"
                              class="buying-scheme__chair buying-scheme__chair_{{$place->type}}{{$taken}}"></span>
                    @elseif($tickets->where('row', $number_row)->where('place', $number_place)->where('films_id', $show_time->film->id)->where('show_times_id', $show_time->id)->first())
                        <span id="{{$place->id}}"
                              class="buying-scheme__chair buying-scheme__chair_{{$place->type}}{{$taken}}"></span>
                    @else
                        <span id="{{$place->id}}"
                              wire:click="choosePlace({{ $place->id }}, {{ $number_row }}, {{ $number_place}})"
                              class="buying-scheme__chair buying-scheme__chair_{{$place->type}}"></span>
                    @endif
                @endforeach
            </div>
        @endforeach

    </div>
    <div class="buying-scheme__legend">
        <div class="col">
            <p class="buying-scheme__legend-price"><span
                    class="buying-scheme__chair buying-scheme__chair_standart"></span
                @if($show_time->hall->places()->where('type','standart')->exists())
                    <span class="buying-scheme__legend-value">Свободно ({{$show_time->hall->places()->where('type','standart')->first()->price}} руб)</span>
                @else
                    <span class="buying-scheme__legend-value">Свободно (0 руб)</span>
                @endif
            </p>
            <p class="buying-scheme__legend-price"><span
                    class="buying-scheme__chair buying-scheme__chair_vip"></span>
                @if($show_time->hall->places()->where('type','vip')->exists())
                    <span class="buying-scheme__legend-value">Свободно VIP ({{$show_time->hall->places()->where('type','vip')->first()->price}} руб)</span>
                @else
                    <span class="buying-scheme__legend-value"> Свободно VIP (0 руб)</span>
                @endif
            </p>
        </div>
        <div class="col">
            <p class="buying-scheme__legend-price"><span
                    class="buying-scheme__chair buying-scheme__chair_taken"></span> Занято</p>
            <p class="buying-scheme__legend-price"><span
                    class="buying-scheme__chair buying-scheme__chair_selected"></span> Выбрано</p>
        </div>
    </div>
    <a href="{{ route('payment', ['id'=>$show_time->id, 'arrRow'=>json_encode($arrRow), 'arrPlace'=>json_encode($arrPlace), 'arrTaken'=>json_encode($takenIdArr)]) }}"
       class="acceptin-button" style="width: min-content; text-decoration: none">Забронировать</a>
</div>

