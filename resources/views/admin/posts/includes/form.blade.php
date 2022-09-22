<div class="mb-3">
    <label for="input-title" class="form-label">Title</label>
    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" id="input-title">
    {{-- @error('title')
        <div class="alert alert-danger mt-1 w-50 style_error_message">{{ $message }}</div>
    @enderror --}}
    @include('admin.posts.includes.messageError', ['name' => 'title'])
</div>

<div class="mb-3">
    <label for="post_content" class="form-label">Content</label>
    <textarea type="text" rows="6" name="post_content" class="form-control" id="post_content">
        {{ old('post_content', $post->post_content) }}
    </textarea>
    {{-- @error('description')
        <div class="alert alert-danger mt-1 w-50 style_error_message">{{ $message }}</div>
    @enderror --}}
    @include('admin.posts.includes.messageError', ['name' => 'post_content'])
</div>

<div class="mb-3">
    <label for="input-tags" class="form-label d-block">Tags</label>
    @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
            <input 
            class="form-check-input" 
            type="checkbox" 
            value="{{ $tag->id }}" 
            name="tags[]" 
            id="input-tags"
            {{ $post->tags->contains($tag) ? 'checked' : '' }}>
            <label class="form-check-label" for="input-tags">
                {{ $tag->name }}
            </label>
        </div>
    @endforeach
</div>

<div class="mb-3">
    <label for="input-image" class="form-label">Image</label>
    <input type="text" name="post_image" value="{{ old('image_url', $post->post_image) }}" class="form-control"
        id="input-image">
    {{-- @error('image_url')
        <div class="alert alert-danger mt-1 w-50 style_error_message">{{ $message }}</div>
    @enderror --}}
    @include('admin.posts.includes.messageError', ['name' => 'post_image'])
</div>

{{-- <button type="submit" class="btn btn-primary">Edit element</button> --}}
