<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|min:3|unique:posts',
            'content' => 'required|string|min:255',
            'publish_date' => 'required|date_format:Y-m-d',
        ];

        $this->validate($request, $rules);

        $post = new Post();
        $post->fill($request->only(['title', 'content', 'publish_date']));
        $post->save();

        return new PostResource($post);
    }
}
