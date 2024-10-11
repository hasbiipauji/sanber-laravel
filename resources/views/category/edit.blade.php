@extends('layouts.main')

@section('judul')
    Edit Kategori
@endsection

@section('sub-judul')
    Form Edit
@endsection

@section('content')
<form method="POST" action="{{ route('update-category',  ['id' => $category->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama">    
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
