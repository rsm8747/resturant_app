@extends('layout')
@section('content')
<style>
    body {
        color: rgb(173, 40, 151);
      background-image: url('images/c.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
    </style>
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="container">
<h3><u><i>Restaurant List</i></u></h3>
    <!-- Search Form -->
    <form action="{{ url('list') }}" method="GET" class="form-inline mb-3 justify-content-end">
        <div class="d-flex">
            <input class="form-control mr-2" type="text" name="search" placeholder="Search"
            value="{{ request('search') }}" aria-label="Search">
            <div class="btn-group">
                <button class="btn btn-outline-success mr-2" type="submit">Search</button>
                <a href="{{ url('list') }}" class="btn btn-secondary">Clear</a>
            </div>
        </div>
    </form>
    {{-- <div style="background-image: url('{{ asset('images/123.jpg') }}'); background-size: cover; background-position: center; height: 100vh;"> --}}
    <table class="table table-dark table-borderless">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                        <form action="{{ url('delete/' . $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ url('edit/' . $item->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <style>
        .w-5 {
            display: none;
        }
    </style>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center" style="margin-right: 54rem;">
        {{ $data->appends(['search' => request('search')])->links() }}
    </div>
</div>
@stop
