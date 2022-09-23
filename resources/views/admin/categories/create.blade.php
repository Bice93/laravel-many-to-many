@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-6 offset-md-3">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    @include('admin.categories.includes.form')
                </form>
            </div>
        </div>
    </div>
@endsection