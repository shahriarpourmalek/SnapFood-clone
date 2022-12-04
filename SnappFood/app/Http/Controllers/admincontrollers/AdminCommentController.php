<?php

namespace App\Http\Controllers\admincontrollers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::where('comment_status','ShouldDelete')->get();
        $foods = auth()->guard('manager')->user()->resturant->foods;

        return view('admins.comment-manager.index', ['comments' => $comments, 'foods' => $foods]);
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
