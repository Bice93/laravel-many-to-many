@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-6 offset-md-3">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @include('admin.posts.includes.form')
                    <button type="submit" class="btn btn-primary">Create post</button>
                </form>
            </div>
        </div>
    </div>
@endsection