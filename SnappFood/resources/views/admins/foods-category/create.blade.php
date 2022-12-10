@extends('layouts.admin-layout.main')



@section('content')

    <div class="mx-auto mt-24 w-[70%]">

        <form action="/admindashboard/foods-category" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Name</label>
                <input name="name" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Slug</label>
                <input name="slug" type="text" class="h-[50px] bg-orange-100 rounded-lg">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Icon</label>
                <input name="icon" type="file" class="h-[50px] bg-orange-100 rounded-lg w-[300px]">
            </div>


            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Insert</label>
                <input type="submit" class=" h-[50px] bg-orange-600 rounded-lg ">
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
