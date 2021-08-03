@extends('layouts.app')

@section('title', 'Data')
@section('content')
<a href="/data/create" type="button" class="btn btn-primary mb-2 btn-sm">Tambah Category</a>
@foreach ($data as $d)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <p class="card-text">{{$d->name}}</p>

    <hr>
  
    @foreach ($d->cakes as $cake)
    <li> {{$cake->nama}} </li>
    @endforeach
    </hr>

    <a href="/data/{{$d->id}}/edit"> <button class="card-link btn-outline-info">Edit</button></a>
    <form action="/data/{{ $d->id}}" method="POST">

    @csrf
    @method('DELETE')
    <button class="card-link btn-outline-danger">Delete</button></td>
  </div>
</div>
    @endforeach
<div>
    {{ $data -> links() }}
    </div>
@endsection