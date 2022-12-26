<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite('resources/css/app.css')

</head>
<body class="bg-lime-200">
<header>
    @include('layouts.login_layout.header')
</header>
@include('layouts.login_layout.article')
<article>
    @yield('content')
</article>
@if(session()->has('success'))
    <div class="flex flex-row justify-center">
        <p class="text-2xl text-indigo-600">
            {{session()->get('success')}}
        </p>
    </div>
@endif
<footer>

</footer>
</body>
</html>

