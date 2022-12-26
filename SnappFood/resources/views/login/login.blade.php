@extends('layouts.login_layout.main')





@section('content')
    <div class="flex flex-row gap-[100px] justify-center mt-[80px]">
        <a href="/users-login" >
        <div
            class="flex flex-col p-4 w-full max-w-sm bg-orange-100 rounded-lg border shadow-md sm:p-8 dark:bg-lime-500  dark:border-lime-500 h-[600px] hover:shadow-2xl hover:shadow-orange-700">
            <img src="{{asset('images/halal.png')}}">
            <div class="mx-auto flex flex-col mt-6 justify-center text-black"><h3 class="text-4xl font-bold "> login
                    as an user</h3></div>
        </div>
        </a>
        <a href="{{route('managers-login')}}" >

        <div
            class="flex flex-col p-4 w-full max-w-sm bg-orange-100 rounded-lg border shadow-md sm:p-8 dark:bg-orange-500 dark:border-orange-500 h-[600px] hover:shadow-2xl hover:shadow-lime-700">
            <img src="{{asset('images/chef.png')}}">
            <div class="text-4xl font-bold mx-auto flex flex-col mt-6 justify-center text-black"><h3
                    class="text-4xl font-bold "> login
                    as Manager</h3>
            </div>

    </div>
        </a>

    </div>
@endsection
