@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('delete'))
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Deleted!</h4>
                        <hr>
                        <p class="mb-0"> {{ session('delete') }} has been removed!</p>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name Category</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Color</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td><a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a></td>
                                <th scope="row">{{ $category->slug }}</th>
                                <td>
                                    <h5>
                                        <span class="badge rounded-pill" 
                                            style="background-color:{{ $category->color }}">
                                            {{ $category->name }}
                                    </span>
                                </h5>
                                </td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h5>Non ci sono categorie da visualizzare!</h5>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection