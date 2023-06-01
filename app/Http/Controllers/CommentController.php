<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'slug' => 'required',
            'name' => 'required',
            'content' => 'required',
        ]);

        Comment::create($request->all());

        return redirect()->route('posts.view', ['slug' => $request->slug]);

    }
    
}
