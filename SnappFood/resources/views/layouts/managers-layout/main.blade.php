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
                <a href="/managerdashboard" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 bg-gray-200 focus:shadow-outline">

                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/managerdashboard/resturant-info" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Completing resturant info</span>
                </a>
            </li>
            <li>
                <a href="/managerdashboard/food-managing" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Food ManageMent</span>
                </a>
            </li>
            <li>
                <a href="/managerdashboard/resturant-setting" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Setting of resturant</span>
                </a>
            </li>
            <li>
                <a href="/managerdashboard/manage-orders" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Order Management</span>
                </a>
            </li>
            <li>
                <a href="/managerdashboard/archive-of-orders" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Archive Of Orders</span>
                </a>
            </li>
            <li>
                <a href="/managerdashboard/reports" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Reports</span>
                </a>
            </li>
            <li>
                <a href="/managerdashboard/comment-manager" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

                    <span>Comment  Manager</span>
                </a>
            </li>
            <li>
                <a href="/managerdashboard/logout" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">

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

