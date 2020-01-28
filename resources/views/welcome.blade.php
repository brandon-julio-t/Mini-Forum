@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Posts</h1>

        <hr>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>

        @forelse ($posts as $post)
            <div class="my-5">
                <h2>
                    <a href="{{ action('PostController@show', ['post' => $post]) }}">
                        {{ Str::title($post->title) }}
                    </a>
                    @if($post->user->id == Auth::id())
                        <a href="{{ action('PostController@edit', ['post' => $post]) }}" class="btn btn-outline-primary">Edit</a>
                        <form class="d-inline" method="post" action="{{ route('posts.destroy', ['post' => $post]) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </h2>
                <small class="text-muted">Created by {{ $post->creator }}</small>
                <p>{!! nl2br(e($post->body)) !!}</p>
            </div>
        @empty
            <p>No posts.</p>
        @endforelse

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>

    </div>
@endsection
