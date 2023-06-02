<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin')->only('index', 'create', 'edit', 'store', 'destroy', 'update');
        // $this->middleware('verified');
    }

    public function main()
    {
       $posts = Post::where('deleted_at', null)->orderBy('created_at', 'desc')->get();
    $trashed_posts = Post::onlyTrashed()->orderBy('deleted_at', 'desc')->get();

    $active_post_count = count($posts);
    $trashed_post_count = count($trashed_posts);

    $view_data = [
        'posts' => $posts,
        'active_post_count' => $active_post_count,
        'trashed_post_count' => $trashed_post_count
    ];
        
    return view('main', $view_data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    

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
        return view('posts.create');
    }

    function generateRandomString($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
    return $randomString;
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{   
    
    $request['title'] = $request->input('title');
    $request['content'] = $request->input('content');
    $request['author'] = Auth::user()->name;

    if($request->file){
            $validated = $request->validate([
                'file' => 'mimes:png,jpg,jpeg|max:10000000'
            ]);

            $fileName = $this->generateRandomString();
            $extension = $request->file->extension();

            Storage::putFileAs('images', $request->file, $fileName. '.'. $extension);

            $request['image'] = $fileName . '.'. $extension;
            
        }

    Post::create(
            $request->all()
        );

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
        Post::SelectedById($id)
            ->delete();

        return redirect("posts/");
    }

    public function trash()
    {
    
        $trash_item = Post::onlyTrashed()->get();

        $data = [
            'posts' => $trash_item
        ];
        return view('posts.recycle', $data);
    }
}
