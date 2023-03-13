<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // code
        $posts = DB::table('posts')
                    ->select('id', 'title', 'content', 'created_at', 'updated_at')
                    ->get();
        $view_data = [
            'posts' => $posts
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
    //
    $title = $request->input('title');
    $content = $request->input('content');
    DB::table('posts')->insert([
            'title' => $title,
            'content' => $content,
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        ]);

     return redirect('posts');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selected_post = DB::table('posts')
            ->select('id', 'title', 'content', 'created_at', 'updated_at')
            ->where('id', $id)
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
    public function edit($id)
    {
        //
        $selected_post = DB::table('posts')
            ->select('id', 'title', 'content', 'created_at', 'updated_at')
            ->where('id', $id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
