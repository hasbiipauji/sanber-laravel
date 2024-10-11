@extends('layouts.main')

@section('judul')
    Edit Kategori
@endsection

@section('sub-judul')
    Form Edit
@endsection

@section('content')

<div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Masukan Nama" readonly>    
</div>
<a href="{{ route('category') }}" class="btn btn-success btn-sm my-3">Kembali</a>

@endsection
