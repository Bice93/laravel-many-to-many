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
                            <th scope="col">Autore</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Data</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->user->name }}</td>
                                <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></td>
                                <td>
                                    <h5>
                                        <span class="badge rounded-pill" 
                                        @if (isset($post->category))
                                            style="background-color:{{ $post->category->color }}">
                                            {{ $post->category->name }}
                                        @else
                                        style="background-color: lavenderblush">
                                        -
                                        @endif
                                    </span>
                                </h5>
                                </td>
                                <td>{{ $post->post_date }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h5>Non ci sono post da visualizzare!</h5>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- @section('footer-scripts') --}}
{{-- pop-up di conferma eliminazione --}}
    {{-- <script>
        //prendo la lista dei form con classe "form_delete"
        const deleteElement = document.querySelectorAll('.form_delete');
        //per ogni elemento
        deleteElement.forEach(
            formElement => {
                //aggiungo un event listener che ascolta per l'evento di submit
                formElement.addEventListener('submit', function(event) {
                    //ne catturo il funzionamento per non far partire la submit
                    event.preventDefault(); //blocco l'esecuzione automatica dell'event di dafault
                    //chiedo conferma di cancellazione all'utente 
                    const result = window.confirm('Sei sicuro di voler continuare?');
                    //console.log(result);
                    //se l'utente conferma allora invio la submit del form
                    if (result) this.submit();
                });
            });
    </script> --}}
{{-- @endsection --}}
