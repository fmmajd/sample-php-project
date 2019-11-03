<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostCollection;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|min:3|unique:posts',
            'content' => 'required|string|min:255',
            'publish_date' => 'required|date_format:Y-m-d H:i:s',
            'categories' => 'required|array',
            'categories.*' => 'string|min:3|max:255',
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();

        $post = new Post();
        $post->fill($request->only(['title', 'content', 'publish_date']));
        $post->save();

        foreach ($request->input('categories') as $category) {
            $post->categories()->updateOrCreate(
                ['name' => $category],
                ['name' => $category]
            );
        }

        DB::commit();

        return new PostResource($post);
    }

    public function index()
    {
        $posts = Post::orderByDesc('publish_date')->take(10)->get();

        return new PostCollection($posts);
    }
}
