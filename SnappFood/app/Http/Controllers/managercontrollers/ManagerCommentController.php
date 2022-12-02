<?php

namespace App\Http\Controllers\managercontrollers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Resturant;
use Illuminate\Http\Request;

class ManagerCommentController extends Controller
{
    public function index(Request $request)
    {

        $comments = [];
        $orders = Order::where('resturant_id', Resturant::where('manager_id', auth()->guard('manager')->id())->first()->id)->get();
        foreach ($orders as $order) {
            foreach ($order->comments as $comment) {
                if (!is_null($request->food)){
                    if ($comment->food_id == $request->food)
                        $comments[$comment->created_at->format('Y-m-d-H-i-s')] = $comment;
                } else
                    $comments[$comment->created_at->format('Y-m-d-H-i-s')] = $comment;
            }
        }
        krsort($comments);

        $foods = auth()->guard('manager')->user()->resturant->foods;
        return view('managers.comments-manager.index', ['comments' => $comments, 'foods' => $foods]);
    }
    public function answer(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->answer = $request->answer;
        $comment->save();

        return redirect('managerdashboard/comment-manager');
    }
}
