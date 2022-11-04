
@extends('layouts.managers-layout.main')


@section('content')

@if(!\Illuminate\Support\Facades\Auth::guard('manager')->user()->resturant()->first())
    <a class="flex flex-row justify-center" href="/managerdashboard/resturant-info/create">
        <div
            class="text-2xl font-bold flex flex-row justify-center h-20 w-[350px] bg-orange-500 text-gray-200 rounded-lg pt-5">
            your address
        </div>
    </a>
@endif
{{--@foreach($discounts as $discount)--}}
{{--    <div class=" h-[130px] flex flex-row bg-orange-300 rounded-lg border border-white justify-between  ">--}}
{{--        <div class="flex flex-col justify-center   pl-3">--}}
{{--            <h3 class="text-2xl text-white" >Title:  {{$discount->title}}</h3>--}}
{{--            <h3 class="text-2xl text-white" >Amount:  {{$discount->amount}}%</h3>--}}
{{--            <h3 class="text-2xl text-white" >expires at:  {{$discount->expire_time}}</h3>--}}
{{--        </div>--}}

{{--        <form class="flex flex-col justify-center mr-5" action="/admindashboard/discount-manager/{{$discount->id}}" method="post" >--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit" class="bg-red-500 text-white rounded-lg h-[30px] w-[50px] " href="/admindashboard/discount-manager/{{$discount->id}}">--}}
{{--                Delete--}}
{{--            </button>--}}
{{--        </form>--}}

{{--    </div>--}}
{{--    </div>--}}

{{--@endforeach--}}
@endsection
