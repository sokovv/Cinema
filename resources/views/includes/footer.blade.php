<footer class=" page-footer footer py-3 border-top" style="bottom:0">
    <nav class="navbar navbar-expand-sm bg-body-tertiary  ">
        <div class="container">
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="navbar-collapse">
                <ul class="nav navbar-nav me-auto mb-2 mb-sm-0 ">
                    @if(Route::current()->uri === '/' || Route::current()->uri === 'admin')
                        @guest
                            <li class="nav-item">
                                <a href="{{route('cinema')}}" class="nav-link {{active_link('cinema')}} text-white"
                                   aria-current="page">    {{ __('Главная') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('login')}}"
                                   class="nav-link {{active_link('login')}} text-white">{{ __('Вход для админа') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('index')}}" class="nav-link {{active_link('index')}} text-white"
                                   aria-current="page">    {{ __('Админка') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cinema')}}" class="nav-link {{active_link('cinema')}} text-white"
                                   aria-current="page">    {{ __('Главная') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти из админки') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
            </li>

            @endguest
            @endif
            </ul>
        </div>
        <a href="{{route('cinema')}}" class="pe-none navbar-brand text-white ">
            © Copyright 2023
        </a>
        </div>
    </nav>
</footer>

