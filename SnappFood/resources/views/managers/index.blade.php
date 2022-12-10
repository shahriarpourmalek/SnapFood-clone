@extends('layouts.signin_layout.main')


@section('content')


    <div class="mx-auto mt-24 w-[70%]">
        <form action="{{route('managers-register')}}" method="post">
            @csrf
            @method('POST')
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">User Name</label>
                <input name="username" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Email</label>
                <input name="email" type="text" class="h-[50px] bg-orange-100 rounded-lg">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Phone Number</label>
                <input name="phone" type="text" class="h-[50px] bg-orange-100 rounded-lg">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Password</label>
                <input name="password" type="password" class="h-[50px] bg-orange-100 rounded-lg">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">sign up</label>
                <input type="submit" class=" h-[50px] bg-orange-600 rounded-lg w-">
            </div>
            <ul>
                @if($errors->any())
                    @foreach($errors->all() as $error)

                        <li class="text-red-600 text-xl ">{{$error}}</li>
                    @endforeach
                @endif
            </ul>
        </form>
    </div>


@endsection
