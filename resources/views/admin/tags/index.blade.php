@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-md-3">
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
                            <th scope="col">Name Tag</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($tags as $tag)
                            <tr>
                                <td scope="row">{{ $tag->id }}</td>
                                <td><a href="{{ route('admin.tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                                <td>
                                    <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.tags.destroy', $tag->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h5>Non ci sono tags da visualizzare!</h5>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection