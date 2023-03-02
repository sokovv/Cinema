<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title', 'CinemaController')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet"  href="{{ asset('admins/css/normalize.css') }}">
    <link rel="stylesheet"  href="{{ asset('admins/css/styles.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext"
        rel="stylesheet">
    @livewireStyles
</head>
<body>

@include('includes.headerAdmin')

<main>
    @yield('content')
</main>

@include('includes.footer')


<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"></script>
<script src="{{ asset('admins/js/accordeon.js') }}" defer></script>
<script src="{{ asset('admins/js/demo.js') }}" defer></script>
@livewireScripts
</body>
</html>
