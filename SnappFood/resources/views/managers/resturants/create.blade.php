
@extends('layouts.managers-layout.main')


@section('content')


    <div class="mx-auto mt-24 w-[70%]">
        <form action="{{route('managers.restaurant-info.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Resturant Name</label>
                <input name="name" type="text" class="h-[50px] bg-orange-100 rounded-lg ">
            </div>

            <div class="flex flex-col ">




                <label class="text-black text-2xl  ">Resturant Category</label>
                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="inline-flex items-center rounded-lg bg-orange-300 px-4 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-orange-300 dark:hover:bg-orange-400 dark:focus:ring-blue-800" type="button">
                    Resturant category <svg class="ml-2 h-4 w-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 block w-[600px] divide-y divide-gray-100 rounded  shadow bg-orange-100 " data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(327px, 70px, 0px);">
                    <div class="py-1 text-sm text-gray-700 dark:text-gray-200  " aria-labelledby="dropdownDefault">
                @foreach($categories as $category)
                <div class="flex flex-row ">

                    <input name="category[]" type="checkbox" class="h-[50px] bg-orange-100 rounded-lg flex flex-col justify-center" value="{{$category->id}}">
                    <label class="text-black text-2xl  flex flex-col justify-center">{{$category->name}}</label>
                </div>

                @endforeach
                    </div>
                </div>
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Phone Number</label>
                <input name="phone" type="text" class="h-[50px] bg-orange-100 rounded-lg">
            </div>

            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Account Number</label>
                <input name="account_number" type="text" class="h-[50px] bg-orange-100 rounded-lg">
            </div>


            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">Address</label>
                <textarea name="address"  class="h-[150px] bg-orange-100 rounded-lg " placeholder="                    qazvin , shahid babayi street
">
                </textarea>
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">latitude</label>
                <input name="latitude" type="text" class=" h-[50px] bg-orange-100 rounded-lg w-" >
            </div>
            <div class="flex flex-col ">
                <label class="text-black text-2xl  ">longitude</label>
                <input name="longitude" type="text" class=" h-[50px] bg-orange-100 rounded-lg w-" >
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


    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

@endsection
