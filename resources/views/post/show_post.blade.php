@extends('layouts.app')

@section('content')
    <div class="container">
        <article>
            <h1>{{ $post->title }}</h1>
            <small class="text-muted">Created by {{ $post->user->name }}</small>
            <p>{!! nl2br(e($post->body)) !!}</p>
        </article>

        <hr>

        <h2>Comments</h2>
            @forelse($post->comments as $comment)
                <h3>{{ $comment->user->name }}</h3>
                <p>{{ nl2br(e($comment->body)) }}</p>

                @if($comment->user->id == Auth::id())
                    <form method='post' action="{{ route('comment.destroy', ['comment' => $comment]) }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif

                <hr>
            @empty
                <p>No comment.</p>
            @endforelse

        <form action="{{ route('comment.store') }}" method="post">
            @csrf

            <input type="hidden" name="post_id" value="{{ $post->id }}"/>

            <div class="form-group row">
                <div class="col">
                    <textarea name="body" value="{{ old('body') }}"
                              class="form-control @error('body') is-invalid @enderror"
                              placeholder="Nice post!" rows="13" required></textarea>

                    @error('body')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
