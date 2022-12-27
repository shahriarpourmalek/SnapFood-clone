<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite('resources/css/app.css')

</head>
<body class="bg-lime-200">
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

<script>
    const items = [
        {
            position: 0,
            el: document.getElementById('carousel-item-1')
        },
        {
            position: 1,
            el: document.getElementById('carousel-item-2')
        },
        {
            position: 2,
            el: document.getElementById('carousel-item-3')
        },
        {
            position: 3,
            el: document.getElementById('carousel-item-4')
        },
    ];

    const options = {
        activeItemPosition: 1,
        interval: 3000,

        indicators: {
            activeClasses: 'bg-white dark:bg-gray-800',
            inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
            items: [
                {
                    position: 0,
                    el: document.getElementById('carousel-indicator-1')
                },
                {
                    position: 1,
                    el: document.getElementById('carousel-indicator-2')
                },
                {
                    position: 2,
                    el: document.getElementById('carousel-indicator-3')
                },
                {
                    position: 3,
                    el: document.getElementById('carousel-indicator-4')
                },
            ]
        },

        // callback functions
        onNext: () => {
            console.log('next slider item is shown');
        },
        onPrev: ( ) => {
            console.log('previous slider item is shown');
        },
        onChange: ( ) => {
            console.log('new slider item has been shown');
        }
    };
    const carousel = new Carousel(items, options);
    // goes to the next (right) slide
    carousel.next()

    // goes to the previous (left) slide
    carousel.prev()
    // jumps to the 3rd position (position starts from 0)
    carousel.slideTo(2)
    // starts or resumes the carousel cycling (automated sliding)
    carousel.cycle()

    // pauses the cycling (automated sliding)
    carousel.pause()
</script>
<script src="../path/to/flowbite/dist/flowbite.js"></script>

</body>
</html>

