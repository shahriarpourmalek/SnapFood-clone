
@extends('layouts.managers-layout.main')


@section('content')

    <h2 class="text-4xl flex justify-center font-bold mb-6 text-gray-900">Edit {{$food->name}}</h2>

    <div class="mx-auto mt-24 w-[70%]">
        <form action="/managerdashboard/food-managing/{{$food->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Food Name</label>
                <input name="name" type="text" class="h-[50px] bg-orange-100 rounded-lg " value="{{$food->name}}">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Food Raw mmaterial</label>
                <textarea name="raw_material" type="text" class="h-[150px] bg-orange-100 rounded-lg ">
                    {{$food->raw_material}}
                </textarea>
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Price</label>
                <input name="price" type="text" class="h-[50px] bg-orange-100 rounded-lg " value="{{$food->price}}">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Image</label>
                <input name="image" type="file" class="h-[50px] bg-orange-100 rounded-lg w-[300px]">
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Foods Category</label>
                <select name="food_category" class="inline-flex items-center rounded-lg bg-orange-300 px-4 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-orange-300 dark:hover:bg-orange-400 ">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" class="text-black text-2xl  flex flex-col justify-center">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">insert</label>
                <input type="submit" class=" h-[50px] bg-orange-600 rounded-lg w-" value="insert">
            </div>

            @if($errors->any())
                @foreach($errors->all() as $error)

                    <li class="text-red-600 text-xl ">{{$error}}</li>
                    @endforeach
                    @endif
                    </ul>

        </form>
    </div>


    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

@endsection
