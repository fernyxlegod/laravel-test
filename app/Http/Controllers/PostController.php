<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostSaveRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderByDesc('updated_at')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    public function store(PostSaveRequest $request)
    {
        Post::create($request->validated());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $post->load('user');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    public function update(PostSaveRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }

    public function showUser(User $user)
    {
        $user->load(['posts' => function($query) {
            $query->orderBy('updated_at', 'desc');
        }]);

        return view('users.show', compact('user'));
    }

    public function indexUsers()
    {
        $users = User::withCount('posts')->orderBy('name')->paginate(10);
        return view('users.index', compact('users'));
    }
}
