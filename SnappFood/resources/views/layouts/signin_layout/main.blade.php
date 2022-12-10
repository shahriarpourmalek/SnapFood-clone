<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite('resources/css/app.css')

</head>
<body class="">
<header>
    @include('layouts.signin_layout.header')
</header>
<article>
    @yield('content')
</article>

<footer>

</footer>
</body>
</html>


