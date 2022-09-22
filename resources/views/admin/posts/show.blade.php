@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-md-3">
                @if (session('edited'))
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <hr>
                        <p class="mb-0">{{ session('edited') }} has been successfully modified!</p>
                    </div>
                @elseif (session('created'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <hr>
                        <p class="mb-0">{{ session('created') }} was successfully created!</p>
                    </div>
                @endif
                <div class="card p-3">
                    <img src="{{ $post->post_image }}" class="card-img-top" alt="{{ $post->title }}'s image">
                    <div class="card-body">
                        <h4>{{ $post->title }}</h4>
                        <h6>Written by: {{ $post->user->name }} | {{ $post->post_date }}</h6>
                        <h6>Category:
                            <span class="badge rounded-pill"
                                @if (isset($post->category)) style="background-color:{{ $post->category->color }}">
                                            {{ $post->category->name }}
                                        @else
                                        style="background-color: lavenderblush">
                                        - @endif
                                </span>
                                {{-- <span class="badge rounded-pill" style="background-color:{{ $post->category->color }}">
                                {{ $post->category->name }}
                            </span> --}}
                        </h6>
                        <p class="card-text">{{ $post->post_content }}</p>
                        <h6>
                            <span>
                                @if (isset($post->tags))
                                    @foreach ($post->tags as $tag)
                                        #{{ $tag->name }}
                                    @endforeach
                                @else
                                    No tags
                                @endif
                            </span>
                        </h6>
                    </div>

                    <div class="col-6 offset-md-3 text-center">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
