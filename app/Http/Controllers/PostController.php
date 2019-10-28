<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function store(Request $request): Response
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

        return $this->jsonResponse(
            $post->only(['title', 'content', 'publish_date'])
        );
    }
}
