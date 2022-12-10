@extends('layouts.managers-layout.main')


@section('content')
    @foreach($comments as $comment)

        <div class="w-full bg-orange-300 rounded-lg flex flex-row justify-center gap-10 my-6 py-5">
            <div class="text-gray-700  flex flex-col  ">
                <p> user info</p>
                <p> comment from:   {{$comment->user->name}}</p>

            </div>
            <div class="text-gray-700  flex flex-col  ">
                <p> food info</p>
                <p> food name:   {{$comment->food->name}}</p>

            </div>
            <div class="text-gray-700  flex flex-col  ">
                <p>comment status: {{$comment->comment_status}}</p>
                <p>comment maasage : {{ $comment->message }}</p>
                <p>comment score: {{ $comment->score }}</p>
<p>comment answer : {{$comment->answer}}</p>
            </div>

        </div>
        <div class=" rounded-lg ">
            <div class="flex flex-col">

                <form class="" action="" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $comment->id }}">
                    <input class="w-full bg-lime-200 h-12 rounded-lg" type="text" placeholder="Answer" name="answer">
                    <div class="mt-1 text-center">
                        <input class="bg-blue-200 mt-5 h-12 w-40 rounded-lg text-yellow-500 text-2xl font-bold" type="submit" value="Reply">
                    </div>
                </form>
                <div class="flex flex-row justify-center gap-4">
                <form action="" method="post">
                    @csrf
                    @method('put')

                    <div class="mt-1 text-center">
                        <button class="bg-yellow-200 mt-5 h-12 w-40 rounded-lg text-yellow-500 text-2xl font-bold" type="submit" name="id" value="{{$comment->id}}">
                            Accept
                        </button>
                    </div>
                </form>
                    <form action="" method="post">
                        @csrf
                        @method('put')

                        <div class="mt-1 text-center">
                            <button class="bg-red-200 mt-5 h-12 w-40 rounded-lg text-blue-500 text-xl font-bold" type="submit" name="id" value="{{$comment->id}}">
                                Delete Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
