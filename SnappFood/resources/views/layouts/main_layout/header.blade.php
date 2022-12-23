
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-white">
        <div class="w-[80%] flex flex-wrap justify-between items-center mx-auto h-[90px]">
            <a href="/" class="flex items-center">
                <img src="{{asset('images/foodlogo.png')}}" class="mr-3 h-[70px] w-[70px] rounded-full" alt="food Logo"/>
                <span class="self-center text-4xl font-bold whitespace-nowrap dark:text-orange-600">Sofre</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-white dark:border-gray-700">
                    <li>
                        <a href="/"
                           class="block  text-2xl py-2 pr-4 pl-3 text-2x bg-blue-700 rounded md:bg-transparent md:p-0 dark:text-orange-700"
                           aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/order"
                           class="block text-xl py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-00 md:dark:hover:text-orange-400 dark:hover:bg-gray-700 dark:hover:text-orange-500 md:dark:hover:bg-transparent">
                            Order food
                        </a>
                    <li>
                        <a href="{{route('managers-register')}}"
                           class="block text-xl py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-00 md:dark:hover:text-orange-400 dark:hover:bg-gray-700 dark:hover:text-orange-500 md:dark:hover:bg-transparent">Sign as Manager</a>
                    </li>
                    <li>
                        <a href="/users-register"
                           class="block text-xl py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-00 md:dark:hover:text-orange-400 dark:hover:bg-gray-700 dark:hover:text-orange-500 md:dark:hover:bg-transparent">Sign as User </a>
                    </li>
                    <li>
                        <a href="{{route('login')}}"
                           class="block text-xl py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-00 md:dark:hover:text-orange-400 dark:hover:bg-gray-700 dark:hover:text-orange-500 md:dark:hover:bg-transparent">login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
