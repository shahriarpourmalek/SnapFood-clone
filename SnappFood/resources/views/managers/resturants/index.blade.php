@extends('layouts.managers-layout.main')


@section('content')

    @if(!\Illuminate\Support\Facades\Auth::guard('manager')->user()->resturant()->first())
        <a class="flex flex-row justify-center" href="/managerdashboard/resturant-info/create">
            <div
                class="text-2xl font-bold flex flex-row justify-center h-20 w-[350px] bg-orange-500 text-gray-200 rounded-lg pt-5">
                your address
            </div>
        </a>
    @endif
    @if($resturant)
    <div class=" h-full flex flex-row bg-orange-300 rounded-lg border border-white justify-between  ">
        <div class="flex flex-col justify-center   pl-3">
            <h3 class="text-2xl text-white">Resturant Name: {{$resturant->name}}</h3>
            <h3 class="text-2xl text-white">Resturant number: {{$resturant->number}}</h3>
            <h3 class="text-2xl text-white">account number: {{$resturant->account_number}}</h3>
            <h3 class="text-2xl text-white">resturant latitude: {{$resturant->longitude}}</h3>
            <h3 class="text-2xl text-white">resturant longitude: {{$resturant->latitude}}</h3>
            <h3 class="text-2xl text-white">resturant address: {{$resturant->address}}</h3>
            <h3 class="text-2xl text-white">opens at: {{$resturant->open_time}}  and closed at: {{$resturant->closed_time}}</h3>
            <h3 class="text-2xl text-white">delivery cost: {{$resturant->delivery_cost}}</h3>

            <h3 class="text-2xl text-white">resturant categories:</h3>

            @foreach($resturant->categories as $category)
                <h3 class="text-2xl text-white">  {{$category->name}}</h3>

            @endforeach
        </div>
        <div class="flex flex-col justify-center gap-10 mr-16">
            <a class="ml-12 bg-green-500 text-white rounded-lg h-[30px] w-[60px] flex justify-center"
               href="/managerdashboard/resturant-info/{{$resturant->id}}">
                show </a>
            <a class="ml-12 bg-yellow-400 text-white rounded-lg h-[30px] w-[60px] flex justify-center"
               href="/managerdashboard/resturant-info/{{$resturant->id}}/edit">
                edit </a>
        </div>
    </div>
    @endif

@endsection
