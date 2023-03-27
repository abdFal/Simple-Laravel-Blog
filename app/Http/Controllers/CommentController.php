<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->back();
    }
    
}
