<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite('resources/css/app.css')

</head>
<body class="">

<div class="flex flex-wrap bg-gray-100 w-full h-screen">
    <div class="w-3/12 bg-white rounded p-3 shadow-lg">

        <ul class="space-y-2 text-sm">
            <li>
                <a href="{{route('admindashboard')}}" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 bg-gray-200 focus:shadow-outline">

                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admindashboard/resturant-category" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Resturant Category Option</span>
                </a>
            </li>
            <li>
                <a href="/admindashboard/foods-category" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Food Category Option</span>
                </a>
            </li>
            <li>
                <a href="/admindashboard/discount-manager" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Discount Manager</span>
                </a>
            </li>
            <li>
                <a href="/admindashboard/comments-manager" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Comment Manager</span>
                </a>
            </li>
            <li>
                <a href="/admindashboard/add-banner" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Adding Banner</span>
                </a>
            </li>

            <li>
                <a href="/admindashboard/logout" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="w-9/12">
        <div class="p-4 text-gray-500">
            @yield('content')
        </div>
    </div>
</div>

<footer>

</footer>
</body>
</html>

