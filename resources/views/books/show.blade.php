@extends('layouts.main')
@section('title', 'Detail buku')


@section('judul')
    Detail Buku
@endsection

@section('content')

<img src="{{ asset('img/'.$book->image) }}" alt="" style="width: 100%; max-height: 300px; object-fit: cover; object-position: center;">
<h2 class="font-weight-bolder">{{ $book->title }}</h2>
<p class="my-0">{{ $book->summary }}</p>
<small>Jumlah Stok Buku : {{ $book->stock }}</small>
<hr>

@auth    
<h4>Pinjam Buku</h4>
<form action="{{ route('create-borrow', $book) }}" method="post">
    @csrf
    <input type="date" class="form-control col-3 mb-1" name="tanggal_peminjaman">
    @error('content')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
    <input type="submit" value="pinjam" class="btn btn-secondary btn-sm">
</form>
@endauth
<hr>

<div class="d-flex justify-content-end">
    <a href="{{ route('books.index') }}" class="btn btn-outline-info">Kembali</a>
</div>
@endsection