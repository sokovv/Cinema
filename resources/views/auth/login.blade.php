@extends('layouts.baseAdmin')

@section('page.title')
    Страница входа
@endsection

@section('content')
    <main>
        <section class="login mb-5">
            <header class="login__header">
                <h2 class="login__title">  {{ __('Авторизация') }}</h2>
            </header>
            <div class="login__wrapper">
                <form class="login__form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <label class="required login__label" for="mail">
                        {{ __('E-Mail') }}
                        <input id="email" type="email"
                               class="login__input form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required
                               autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </label>
                    <label for="password" type="password" class="required login__label ">
                        {{ __('Пароль') }}
                        <input id="password" type="password"
                               class="login__input form-control @error('password') is-invalid @enderror" placeholder=""
                               name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </label>
                    <div class="row mb-1 mt-2 ">
                        <div class="col-md-6 offset-md-4 ms-0" >
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Запомнить меня') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input value="  {{ __('Авторизоваться') }}" type="submit" class="login__button">
                    </div>
                </form>

            </div>
        </section>
    </main>
@endsection()
