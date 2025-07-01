@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-0">{{ $post->title }}</h2>
                            <div class="text-muted small">
                                By <a href="{{ route('users.show', $post->user) }}">{{ $post->user->name ?? 'Unknown' }}</a> •
                                {{ $post->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="post-content py-3">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        <div class="mt-4 border-top pt-3">
                            <div class="d-flex justify-content-between">
                                <div class="text-muted small">
                                    Created: {{ $post->created_at->format('d.m.Y H:i') }} •
                                    Updated: {{ $post->updated_at->format('d.m.Y H:i') }}
                                </div>
                                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-1"></i> Back to all posts
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
