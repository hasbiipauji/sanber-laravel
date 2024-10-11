@extends('layouts.main')

@section('judul')
    Tambah Kategori
@endsection

@section('sub-judul')
    Form Tambah
@endsection

@section('content')
<form method="POST" action="{{ route('store-category') }}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama">    
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection
