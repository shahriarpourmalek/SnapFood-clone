@extends('layouts.managers-layout.main')


@section('content')



    <div class="mt-16">
            <div class="my-4 py-5 bg-orange-300 flex flex-row rounded-lg ">
                <div class="flex flex-col mx-2">
                    order detatils:
                    <p>order status: {{$order->order_status}}</p>
                    @if($order->is_paid === 1)
                        <p>payment status:paid</p>
                    @elseif($order->is_paid === 0 )
                        <p>payment status:not paid</p>
                    @endif
                    <p>{{$order->total_price}}</p>
                </div>
                <div class="flex flex-col mx-8">
                    user details:
                    <p> user name:{{ $user->find($order->user_id)->name}}</p>
                    <p> user phone number:{{ $user->find($order->user_id)->phone}}</p>
                    <p> user address : {{$address->find($user->find($order->user_id)->current_address)->address}}</p>
                </div>
                <div class="flex flex-col mx-8">
                    foods detaills:
                    @foreach($order->foods()->get() as $food)
                        <p> food name:{{$food->name }}</p>

                    @endforeach
                </div>
            </div>

    </div>
<form action="{{route('managers.manage-orders.update',$order->id)}}" method="post">
    @csrf
    @method('PUT')
        <select class="bg-indigo-500 text-white w-full h-10 rounded-lg" name="status" >
            <option value="1" selected>Pending</option>
            <option value="2">Preparing</option>
            <option value="3">Delivering</option>
            <option value="4">Taken Over</option>
        </select>
<div class="flex flex-row justify-center">
<button type="submit"  class="bg-lime-500 h-12 text-white w-40  h-10 rounded-lg mt-5">
    Change
</button>
</div>
</form>
@endsection
