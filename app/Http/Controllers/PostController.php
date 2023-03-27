<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    if (!Auth::check()) {
        return redirect('login');
    }

    $posts = Post::where('deleted_at', null)->orderBy('created_at', 'desc')->get();
    $trashed_posts = Post::onlyTrashed()->orderBy('deleted_at', 'desc')->get();

    $active_post_count = count($posts);
    $trashed_post_count = count($trashed_posts);

    $view_data = [
        'posts' => $posts,
        'active_post_count' => $active_post_count,
        'trashed_post_count' => $trashed_post_count
    ];
        
    return view('posts.index', $view_data);
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!Auth::check()) {
        return redirect('login');
    }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{   
    if (!Auth::check()) {
        return redirect('login');
    }
    //
    $title = $request->input('title');
    $content = $request->input('content');
    Post::create([
            'title' => $title,
            'content' => $content,

        ]);

     return redirect('posts');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (!Auth::check()) {
        return redirect('login');
    }
        $selected_post = Post::where('slug', $slug)
            ->first();
        $view_data = [
            'post' => $selected_post
        ];
        return view('posts.show', $view_data);
    }

    // -----------------------------------------------

    /**
     * public function show($id)
    *{
    *$post = DB::table('posts')->where('id', $id)->first();
    *if (!$post) {
        *abort(404);
    *}
    *$view_data = [
        *'post' => $post
    *];
    *return view('posts.show', $view_data);
    *}
     */

    // -----------------------------------------------

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (!Auth::check()) {
        return redirect('login');
    }
        //
        $selected_post = Post::where('slug', $slug)
            ->first();
        $view_data = [
            'post' => $selected_post
        ];

        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
{   
    if (!Auth::check()) {
        return redirect('login');
    }
    $input = $request->all();
    Post::where('slug', $slug)
        ->update([
            'title' => $input['title'],
            'content' => $input['content'],
        ]);

    return redirect("posts/$slug");
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
        return redirect('login');
    }
        //
        Post::SelectedById($id)
            ->delete();

        return redirect("posts/");
    }

    public function trash()
    {
        if (!Auth::check()) {
        return redirect('login');
    }
        # code...
        $trash_item = Post::onlyTrashed()->get();

        $data = [
            'posts' => $trash_item
        ];
        return view('posts.recycle', $data);
    }
}
