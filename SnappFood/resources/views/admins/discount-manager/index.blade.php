@extends('layouts.admin-layout.main')



@section('content')
    <div class="flex flex-row justify-center mb-10">
        <h1 class="text-gray-500 text-4xl   ">dicount manager</h1>
    </div>
    <a class="flex flex-row justify-center" href="{{route('admin.foods-category.create')}}">
        <div
            class="text-2xl font-bold flex flex-row justify-center h-20 w-[350px] bg-orange-500 text-gray-200 rounded-lg pt-5">
            Add Discount
        </div>
    </a>
    <div class="mt-10 w-full  flex flex-col gap-10 ">
        @foreach($discounts as $discount)
            <div class=" h-[130px] flex flex-row bg-orange-300 rounded-lg border border-white justify-between  ">
                <div class="flex flex-col justify-center   pl-3">
                    <h3 class="text-2xl text-white">Title: {{$discount->title}}</h3>
                    <h3 class="text-2xl text-white">Amount: {{$discount->amount}}%</h3>
                    <h3 class="text-2xl text-white">expires at: {{$discount->expire_time}}</h3>
                </div>

                <form class="flex flex-col justify-center mr-5"
                      action="{{route("admin.discount-manager.delete",$discount)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white rounded-lg h-[30px] w-[50px] " name="id">
                        Delete
                    </button>
                </form>

            </div>
    </div>

    @endforeach

    </div>

@endsection
