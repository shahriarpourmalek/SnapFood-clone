@extends('layouts.admin-layout.main')



@section('content')
    <a class="flex flex-row justify-center" href="/admindashboard/resturant-category/create">
        <div
            class="text-2xl font-bold flex flex-row justify-center h-20 w-60 bg-orange-500 text-gray-200 rounded-lg pt-5">
            Create Categories
        </div>
    </a>
    <div class="mt-10 w-full  flex flex-col gap-10 ">
        @foreach($categories as $category)
            <div class=" h-[90px] flex flex-row bg-orange-300 rounded-lg border border-white justify-between  ">
                <div class="flex flex-col justify-center text-2xl text-white  pl-3">
                    {{$category->name}}
                </div>
<div class="flex flex-col mr-5 gap-2 mt-1">
    <a class="bg-green-500 text-white rounded-lg h-[30px] w-[50px] flex justify-center" href="/admindashboard/resturant-category/{{$category->id}}/edit">
        Edit
    </a>
    <form action="/admindashboard/resturant-category/{{$category->id}}" method="post" >
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white rounded-lg h-[30px] w-[50px] flex justify-center" href="/admindashboard/resturant-category/{{$category->id}}">
            Delete
        </button>
    </form>

</div>
            </div>

        @endforeach

    </div>

@endsection
