<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite('resources/css/app.css')

</head>
<body class="">
<header>
    @include('layouts.main_layout.header')
</header>
@include('layouts.main_layout.article')
<article>
    @yield('content')
</article>

<footer class="mt-[400px]" >
@include('layouts.main_layout.footer')
</footer>
</body>
</html>

