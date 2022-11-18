@extends('layouts.managers-layout.main')


@section('content')
    <h2 class="text-4xl flex justify-center font-bold mb-6 text-gray-900">Set work Time</h2>

    <div class="mx-auto mt-24 w-[70%]">
        @foreach($days as $day)

        <label class="text-black text-2xl  ">{{$day}}</label>
        <form class="flex flex-row justify-between" action="/managerdashboard/resturant-setting/working-time" method="post">
            @csrf
            @method('POST')

            <div class="flex flex-col gap-2">
                <div class="flex flex-row gap-10">
                <input name="open_time" type="time" class="h-[50px] bg-orange-100 rounded-lg" >
                <input name="close_time" type="time" class="h-[50px] bg-orange-100 rounded-lg">
                </div>
            </div>
            <div class="flex flex-col ">
                <input type="submit" name="day_of_week" class=" h-[50px] bg-orange-600 rounded-lg w-[60px]" value="{{$day}}">
            </div>

            @if($errors->any())
                @foreach($errors->all() as $error)

                    <li class="text-red-600 text-xl ">{{$error}}</li>
                    @endforeach
                    @endif
                    </ul>

        </form>
        @endforeach
    </div>
@endsection
