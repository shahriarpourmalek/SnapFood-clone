@extends('layouts.managers-layout.main')
@section('content')

    <div class="flex flex-row gap-10 w-full justify-center ">
        <div class="flex flex-col justify-center bg-orange-300 w-[250px] h-32 text-white rounded-lg ">
            <div class=" text-white text-2xl mx-auto">
                Total income:


            </div>
            <div class=" text-white text-2xl mx-auto">
            <?php $total_income = 0 ?>
                @foreach($orders as $order)
                    <?php $total_income = $order->total_price; ?>
                @endforeach
                {{$total_income}}

            </div>
        </div>
        <div class="flex flex-col justify-center bg-lime-300 w-[250px] h-32 text-white  rounded-lg">
            <div class=" text-white text-2xl mx-auto">
                Total order count:
            <?php $total_count = 0;?>
                @foreach($orders  as $order)

                    @if($order->order_status != 'taken_over')
                        <?php $total_count++ ; ?>
                    @endif
                @endforeach
                {{$total_count}}
            </div>
        </div>
        <div class="flex flex-col justify-center bg-blue-300 w-[250px] h-32 text-white  rounded-lg">
            <div class="text-white text-2xl mx-auto">
                Total income:
            </div>
        </div>
        <div class="flex flex-col justify-center bg-indigo-300 w-[250px] h-32 text-white  rounded-lg">
            <div class=" text-white text-2xl mx-auto">
                Total income:
            </div>
        </div>
    </div>
    <form action="/managerdashboard/manage-orders" method="post">
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
            @if($order->order_status != 'taken_over')
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
                        <p> user address
                            : {{$address->find($user->find($order->user_id)->current_address)->address}}</p>
                    </div>
                    <div class="flex flex-col mx-8">
                        foods detaills:
                        @foreach($order->foods()->get() as $food)
                            <p> food name:{{$food->name }}</p>

                        @endforeach
                    </div>

                    <a href="/managerdashboard/manage-orders/{{$order->id}}">
                        <div class=" ml-44  w-40 h-16 bg-blue-200 rounded-lg flex justify-center pt-5">
                            manage order
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>

@endsection
