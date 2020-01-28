@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('posts.update', ['post' => $post]) }}">
                            @csrf
                            @method('PUT')

                            @include('post.post_form')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
