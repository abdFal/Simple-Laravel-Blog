<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('main', 'show');
        $this->middleware('is_admin')->only('index', 'create', 'edit', 'store', 'destroy', 'update');
    }

    public function main()
    {
        $posts = Post::where('deleted_at', null)
            ->orderBy('updated_at', 'desc')
            ->simplePaginate(4);

        $view_data = [
            'posts' => $posts,
        ];

        return view('main', $view_data);
    }

    public function index()
    {
        $posts = Post::where('deleted_at', null)
            ->orderBy('updated_at', 'desc')
            ->where('author', Auth::user()->name)
            ->get();

        $trashed_posts = Post::onlyTrashed()
            ->where('author', Auth::user()->name)
            ->get();

        $active_post_count = count($posts);
        $trashed_post_count = count($trashed_posts);

        $view_data = [
            'posts' => $posts,
            'active_post_count' => $active_post_count,
            'trashed_post_count' => $trashed_post_count,
        ];

        return view('posts.index', $view_data);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function store(Request $request)
    {
        $request['title'] = $request->input('title');
        $request['content'] = $request->input('content');
        $request['author'] = Auth::user()->name;

        if ($request->file) {
            $validated = $request->validate([
                'file' => 'nullable|mimes:jpg,jpeg,png|max:10000000',
            ]);

            $fileName = $this->generateRandomString();
            $extension = $request->file->extension();

            Storage::putFileAs('images', $request->file, $fileName . '.' . $extension);

            $request['image'] = $fileName . '.' . $extension;
        }

        Post::create($request->all());
        return redirect('posts');
    }

    public function show($slug)
    {
        $selected_post = Post::where('slug', $slug)->first();

        $view_data = [
            'post' => $selected_post,
        ];
        return view('posts.show', $view_data);
    }

    public function edit($slug)
    {
        $selected_post = Post::where('slug', $slug)->first();

        $view_data = [
            'post' => $selected_post,
        ];
        return view('posts.edit', $view_data);
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug);

        if ($request->file) {
            $validated = $request->validate([
                'file' => 'mimes:png,jpg,jpeg,webp|max:10000000',
            ]);

            $fileName = $this->generateRandomString();
            $extension = $request->file->extension();

            Storage::putFileAs('images', $request->file, $fileName . '.' . $extension);

            $request['image'] = $fileName . '.' . $extension;
        }

        $post->update($request->only('title', 'content', 'image', 'slug'));

        return redirect("posts/$slug");
    }

    public function destroy($id)
    {
        Post::SelectedById($id)->delete();

        return redirect("posts/");
    }

    public function trash()
    {
        $trash_item = Post::onlyTrashed()->where('author', Auth::user()->name)->get();

        $data = [
            'posts' => $trash_item,
        ];

        return view('posts.recycle', $data);
    }
}
