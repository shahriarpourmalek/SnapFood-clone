
@extends('layouts.managers-layout.main')


@section('content')
    <form action="/managerdashboard/food-managing/add-discount/{{$food->id}}" method="post" >
        @csrf
        @method('PUT')
<div class="flex flex-col ">
    <label class="text-black text-2xl  ">Add discount</label>
    <select name="discount" class="inline-flex items-center rounded-lg bg-orange-300 px-4 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-orange-300 dark:hover:bg-orange-400 ">
        @foreach($discounts as $discount)
            <option value="{{$discount->id}}" class="text-black text-2xl  flex flex-col justify-center">{{$discount->title}}: {{$discount->amount}}     expired at:{{$discount->expire_time}}</option>
        @endforeach
    </select>
</div>
        <div class="flex flex-col ">
            <label class="text-black text-2xl  ">insert</label>
            <input type="submit" class=" h-[50px] bg-orange-600 rounded-lg w-" value="insert">
        </div>
    </form>

@endsection
