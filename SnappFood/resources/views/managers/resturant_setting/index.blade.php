@extends('layouts.managers-layout.main')


@section('content')


    @if(Auth::guard('manager')->user()->resturant()->first())
        <div class=" h-full flex flex-row bg-orange-300 rounded-lg border border-white justify-between  ">
            <div class="flex flex-col justify-center   pl-3">
                <h3 class="text-2xl text-white">Resturant Name: {{$resturant->name}}</h3>
                <h3 class="text-2xl text-white">Resturant number: {{$resturant->number}}</h3>
                <h3 class="text-2xl text-white">account number: {{$resturant->account_number}}</h3>
                <h3 class="text-2xl text-white">resturant latitude: {{$resturant->longitude}}</h3>
                <h3 class="text-2xl text-white">resturant longitude: {{$resturant->latitude}}</h3>
                <h3 class="text-2xl text-white">resturant address: {{$resturant->address}}</h3>
                <h3 class="text-2xl text-white">resturant delivery cost: {{$resturant->delivery_cost}}</h3>

                <h3 class="text-2xl text-white">resturant categories:</h3>

                @foreach($resturant->categories as $category)
                    <h3 class="text-2xl text-white">  {{$category->name}}</h3>

                @endforeach
            </div>
            <div class="flex flex-col justify-center gap-10 mr-16">
                <a class="ml-12 bg-green-500 text-white rounded-lg h-[30px] w-[60px] flex justify-center"
                   href="/managerdashboard/resturant-info/{{$resturant->id}}">
                    show </a>
                <a class="ml-12 bg-green-500 text-white rounded-lg h-[30px] w-[60px] flex justify-center"
                   href="/managerdashboard/resturant-info/{{$resturant->id}}/edit">
                change  </a>
            </div>
        </div>
    @endif
    <div class="flex flex-row gap-10">
    <a href="/managerdashboard/resturant-setting/{{$resturant->id}}/add-delivery-cost">
<div class="mt-16 rounded-lg  w-[300px] h-[70px] bg-indigo-500 text-white text-center flex flex-col justify-center">add delivery cost</div>
    </a>
        <a href="/managerdashboard/resturant-setting/working-time">
            <div class="mt-16 rounded-lg  w-[300px] h-[70px] bg-indigo-500 text-white text-center flex flex-col justify-center">set worktime</div>
        </a>
        <a href="/managerdashboard/resturant-setting/{{$resturant->id}}/working-time">
            <div class="mt-16 rounded-lg  w-[300px] h-[70px] bg-indigo-500 text-white text-center flex flex-col justify-center">edit worktime</div>
        </a>
    </div>
@endsection
