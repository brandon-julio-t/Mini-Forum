<div class="form-group">
    <label for="name" class="text-right">{{ __('Title') }}</label>

    <div class="">
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
               value="{{ $post->title }}" required autofocus>

        @error('title')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col">
        <textarea name="body" value="{{ old('body') }}" class="form-control @error('body') is-invalid @enderror"
                  placeholder="Write something amazing..." rows="13" required>{{ $post->body }}</textarea>

        @error('body')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>

<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">
        {{ __('Submit') }}
    </button>
    <span class="px-1"></span>
    <a href="/" class="btn btn-danger">{{ __('Cancel') }}</a>
</div>
