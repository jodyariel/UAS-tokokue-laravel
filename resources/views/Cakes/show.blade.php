@extends('layouts.app')

@section('title', 'Cakessss')
@section('content')
    <div class="card">
    <h3><img src="{{ url('image') }}/{{$cake['image']}}" width="150" heigh="200"></img></h3>
    <h3>Nama Cake : {{ $cake['nama'] }}</h3>
    <h3>Size Cake : {{ $cake['size'] }}</h3>
    </div>
    
@endsection
   