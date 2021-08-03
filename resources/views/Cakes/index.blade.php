@extends('layouts.app')

@section('title', 'Cakes')
@section('content')
<a href="/cakes/create" type="button" class="btn btn-primary mb-2 btn-sm">Tambah Cakes</a>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Minuman</th>
      <th scope="col"></th>
      <th scope="col">Size</th>
      <th scope="col">Harga</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($cakes as $cake)
    <tr>
    <td><a href="/cakes/{{$cake->id}}" >{{$cake->nama}}</td>
    <td><img src="{{ url('image') }}/{{$cake['image']}}" width="150" heigh="200"></img></td>
    <td>{!!$cake->size !!}</td>
    <td>{!!$cake->harga !!}</td>
    <td><a href="/cakes/{{$cake->id}}/edit"><button type="button" class="btn btn-outline-info">Edit</a></button></td>
    <form action="/cakes/{{ $cake->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-danger">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $cakes -> links() }}
    </div>
@endsection