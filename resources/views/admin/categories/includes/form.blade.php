<div class="row">
    <div class="mb-3 col-10">
        <label for="input-name" class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" id="input-name" required>
        @include('admin.posts.includes.messageError', ['name' => 'name'])
    </div>
    
    <div class="mb-3 col-2">
        <label for="input-color" class="form-label">Color</label>
        <input type="color" class="form-control form-control-color" name="color" value="" id="input_color">
        @include('admin.posts.includes.messageError', ['name' => 'color'])
    </div>
</div>
<div class="mb-3 text-center">
    <button type="submit" class="btn btn-md btn-primary">
        Save & Publish
    </button>
</div>