@extends('layouts.managers-layout.main')


@section('content')
    <table class="border-black  border-collapse">
        <tr class="  ">
            <th class="border-2" >ID</th>
            <th class="border-2">Total price</th>
            <th class="border-2">Ordered at</th>
        </tr>
    @foreach($orders as $order)

    <tr class="">
        <td class="border-2">{{$order->id}}</td>
        <td class="border-2">{{$order->total_price}}</td>
        <td class="border-2">{{$order->created_at}}</td>
    </tr>
    @endforeach
    </table>
@endsection
