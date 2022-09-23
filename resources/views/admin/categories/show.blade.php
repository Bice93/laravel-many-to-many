@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-3">
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
                <h4>Categoria: {{ $category->name }}</h4>
                <div class="w-100 h-50 rounded" style="background-color: {{ $category->color }}"></div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-6 offset-md-3">
                @forelse ($category->posts as $post)
                    <div class="card my-4">
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
                    </div>
                @empty
                    <h5>Non ci sono post da visuliazzare per questa categoria!</h5>
                @endforelse
            </div>
        </div>
    </div>
@endsection
