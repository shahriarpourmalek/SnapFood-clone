@extends('layouts.admin-layout.main')


@section('content')
    <div class="flex flex-row justify-center mb-10">
        <h1 class="text-gray-500 text-4xl   ">Comment manager</h1>
    </div>
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
                <div class="flex flex-row justify-center gap-4">
                    <form action="{{ route('admin.comments.delete', $comment) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <div class="mt-1 text-center">
                            <button class="bg-red-200 mt-5 h-12 w-40 rounded-lg text-blue-500 text-xl font-bold" type="submit" name="id">
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
