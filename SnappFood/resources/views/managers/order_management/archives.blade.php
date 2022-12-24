@extends('layouts.managers-layout.main')


@section('content')

  <div class="text-4xl text-gray-800 bold flex  flex-row justify-center mb-16">archive</div>
    <form action="{{route('managers.manage-orders.index')}}" method="post">
        <div class=" m-auto bg-dark w-100 text-center">
            <select class="form-select" name="filter" data-select2-id="1" tabindex="-1" aria-hidden="true">
                <option value="all" selected>All</option>
                <option value="lastWeek">Last Week</option>
                <option value="lastMonth">Last Month</option>
                <option value="lastYear">Last Year</option>
            </select>

            <input class="btn btn-primary mt-1 mb-1" type="submit" value="Filter">
        </div>
    </form>
    <div class="mt-16">
        @foreach($orders  as $order)
            @if($order->order_status === 'taken_over')
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
            @endif
        @endforeach
    </div>

@endsection
