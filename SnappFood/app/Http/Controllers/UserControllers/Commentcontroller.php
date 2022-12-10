<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Commentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommentRequest $request)
    {
        $request->validatd;

        if (!is_null($request->food_id)) {
            $comments = Comment::where(['food_id' => $request->food_id, 'user_id' => auth()->user()->id])->orderByDesc('created_at')->get();

            return response(['Comments' => CommentResource::collection($comments)]);
        }

        if (!is_null($request->resturant_id)) {
            $comments = [];
            $orders = Order::where(['resturant_id' => $request->resturant_id, 'user_id' => auth()->user()->id])->get();
            foreach ($orders as $order) {
                foreach ($order->comments as $comment) {
                    $comments[$comment->created_at->format('Y-m-d-H-i-s')] = $comment;
                }
            }
            ksort($comments);
            return response(['Comments' => CommentResource::collection(array_values($comments))]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'order_id' => ['required', Rule::exists('orders', 'id')],
            'food_id' => ['required', Rule::exists('foods', 'id')],
            'score' => 'required|integer|min:1|max:5',
            'message' => 'required|string'
        ]);

            Comment::create([
                'order_id' => $request->order_id,
                'food_id' => $request->food_id,
                'user_id' => auth()->user()->id,
                'message' => $request->message,
                'score' => $request->score,
            ]);


        return response(['Message' =>   'comment created successfully']);


    }}
