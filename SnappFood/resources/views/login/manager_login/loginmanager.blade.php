
@extends('layouts.login_layout.main')


@section('content')
<h2 class="text-4xl flex justify-center font-bold mb-6 text-gray-900">Manager's Login</h2>
    <div class="mx-auto mt-24 w-[70%]">
    <form action="{{route('managers-login')}}" method="post">
        @csrf
        @method('POST')

        <div class="flex flex-col ">
            <label class="text-black text-2xl  ">Email</label>
            <input name="email" type="text" class="h-[50px] bg-orange-100 rounded-lg">
        </div>


        <div class="flex flex-col ">
            <label class="text-black text-2xl  ">Password</label>
            <input name="password" type="password" class="h-[50px] bg-orange-100 rounded-lg">
        </div>
        <div class="flex flex-col ">
            <label class="text-black text-2xl  ">sign up</label>
            <input type="submit" class=" h-[50px] bg-orange-600 rounded-lg w-">
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

