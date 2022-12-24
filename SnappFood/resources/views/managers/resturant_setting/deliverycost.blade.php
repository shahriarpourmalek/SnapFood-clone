@extends('layouts.managers-layout.main')


@section('content')


    <div class="mx-auto mt-24 w-[70%]">
        <form action="{{route('managers.restaurant-setting.store-delivery-cost',$resturant->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">delivery Cost</label>
                <input name="delivery_cost" type="text" class="h-[50px] bg-orange-100 rounded-lg">
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
@endsection
