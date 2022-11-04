
@extends('layouts.managers-layout.main')


@section('content')


    <div class="mx-auto mt-24 w-[70%]">
        <form action="/managerdashboard/resturant-info" method="post">
            @csrf
            @method('POST')
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Resturant Name</label>
                <input name="name" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Resturant Category</label>
                @foreach($categories as $category)
                <div class="flex flex-row">

                    <input name="category[]" type="checkbox" class="h-[50px] bg-orange-100 rounded-lg flex flex-col justify-center" value="{{$category->id}}">
                    <label class="text-black text-2xl  flex flex-col justify-center">{{$category->name}}</label>

                </div>
                @endforeach
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Phone Number</label>
                <input name="phone" type="text" class="h-[50px] bg-orange-100 rounded-lg">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Account Number</label>
                <input name="account_number" type="text" class="h-[50px] bg-orange-100 rounded-lg">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Width</label>
                <input name="width" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Height</label>
                <input name="height" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">City</label>
                <input name="city" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Street</label>
                <input name="street" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Pluck</label>
                <input name="pluck" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">insert</label>
                <input type="submit" class=" h-[50px] bg-orange-600 rounded-lg w-" value="insert">
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
