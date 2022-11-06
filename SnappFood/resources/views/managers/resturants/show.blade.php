
@extends('layouts.managers-layout.main')


@section('content')


    <div class=" h-[400px] flex flex-row bg-orange-300 rounded-lg border border-white justify-between  ">
        <div class="flex flex-col justify-center   pl-3">
            <h3 class="text-2xl text-white" >Resturant Name:  {{$resturant->name}}</h3>
            <h3 class="text-2xl text-white" >Resturant number:  {{$resturant->number}}</h3>
            <h3 class="text-2xl text-white" >account number:  {{$resturant->account_number}}</h3>
            <h3 class="text-2xl text-white" >resturant state:  {{$resturant->state}}</h3>
            <h3 class="text-2xl text-white" >resturant city:  {{$resturant->city}}</h3>
            <h3 class="text-2xl text-white" >resturant address:  {{$resturant->address}}</h3>
            <h3 class="text-2xl text-white" >resturant categories:</h3>

            @foreach($resturant->categories as $category)
                <h3 class="text-2xl text-white" >  {{$category->name}}</h3>

            @endforeach
        </div>

        <a class="ml-12 bg-green-500 text-white rounded-lg h-[30px] w-[60px] flex justify-center" href="/managerdashboard/resturant-info/{{$resturant->id}}">
            show                    </a>

    </div>



@endsection
