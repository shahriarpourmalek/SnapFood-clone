@extends('layouts.admin-layout.main')



@section('content')

    <div class="mx-auto mt-24 w-[70%]">

        <form action="{{route('admin.banner-manager.update',$banner->id)}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUt')
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Title</label>
                <input name="title" type="text" value="{{$banner->title}}" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">expire time</label>
                <input name="expire_time" value="{{$banner->expires_at}}" type="datetime-local" class="h-[50px] bg-orange-100 rounded-lg">
            </div>

            <div class="flex flex-col ">
                <img src="{{ URL::asset("images/banner-images/$banner->banner_img") }}"/>

                <label class="text-black text-2xl  ">Banner Image</label>
                <input name="banner_image" value="{{asset("images/banner-images/$banner->banner_img")}}" type="file" class="h-[50px] bg-orange-100 rounded-lg w-[300px]">
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
