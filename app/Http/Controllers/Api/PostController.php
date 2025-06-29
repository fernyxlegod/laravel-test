<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PostSaveRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as ARC;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(): ARC
    {
        $posts = Post::with('user')->paginate(10);
        return PostResource::collection($posts);
    }

    public function store(PostSaveRequest $request): PostResource
    {
        $post=Post::create($request->validated());
        return PostResource::make($post);
    }

    public function show(Post $post): PostResource
    {
        return PostResource::make($post->load('user'));
    }

    public function update(PostSaveRequest $request, Post $post): PostResource
    {
        $post->update($request->validated());
        return PostResource::make($post);
    }

    public function destroy(Post $post): Response
    {
        $post->delete();
        return response()->noContent();
    }
}
