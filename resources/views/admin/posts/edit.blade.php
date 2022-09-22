@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-6 offset-md-3">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('admin.posts.includes.form')
                    <button type="submit" class="btn btn-primary">Edit element</button>
                </form>
            </div>
        </div>
    </div>
@endsection