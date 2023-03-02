<div class="modal fade" id={{$id}}  tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <form action="{{ route($route) }}" method="post" accept-charset="utf-8">
                    @csrf
                    <label class="conf-step__label conf-step__label-fullsize" for="name">
                        <h4>{{ $name }}</h4>
                        @if($id ==='addHall')
                            <input class="conf-step__input" type="text"
                                   placeholder="Например, &laquo;Синий зал&raquo;" name="name" required>
                        @else
                            {{ method_field("DELETE")}}
                            <input type="hidden" name="id" value="{{$id}}">
                        @endif
                    </label>
                    <div class="conf-step__buttons text-center">
                            <input type="submit" value={{ $value }} class="conf-step__button-accent
                                   conf-step__button" data-bs-dismiss="modal">
                        <button type="button" class="conf-step__button conf-step__button-regular"
                                data-bs-dismiss="modal">  {{ __('Отменить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
