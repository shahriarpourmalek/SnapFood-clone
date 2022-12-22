<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Resturant;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::where('comment_status','ShouldDelete')->get();
        $foods = Resturant::with('foods');

        return view('admins.comment-manager.index', ['comments' => $comments, 'foods' => $foods]);
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
