@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-6 offset-md-3">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('admin.categories.includes.form')
                </form>
            </div>
        </div>
    </div>
@endsection