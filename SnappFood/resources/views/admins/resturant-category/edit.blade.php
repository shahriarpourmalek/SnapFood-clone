@extends('layouts.admin-layout.main')



@section('content')
    <div class="mx-auto mt-24 w-[70%]">
        <form action="{{route('admin.restaurant-category.update',$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Name</label>
                <input value="{{$category->name}}" name="name" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Slug</label>
                <input value="{{$category->slug}}" name="slug" type="text" class="h-[50px] bg-orange-100 rounded-lg">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Icon</label>
                <input value="{{$category->icon}}" name="icon" type="file" class="h-[50px] bg-orange-100 rounded-lg w-[300px]">
            </div>


            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Insert</label>
                <input value="update" type="submit" class=" h-[50px] bg-orange-600 text-white rounded-lg ">
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
