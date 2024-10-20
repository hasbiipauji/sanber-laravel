@extends('layouts.main')
@section('title', 'Detail buku')


@section('judul')
    Detail Buku
@endsection

@section('content')

<img src="{{ asset('img/'.$book->image) }}" class="border" alt="" style="width: 100%; max-height: 300px; object-fit: cover; object-position: center;">
<h2 class="font-weight-bolder">{{ $book->title }}</h2>
<p class="my-0">{{ $book->summary }}</p>
<small>Jumlah Stok Buku : {{ $book->stock }}</small>
<hr>

@auth    
<h5 class="my-3 text-center">List Peminjam Buku : </h5>
{{-- digunakan untuk menampilkan setiap item dari koleksi relasi borrows milik model Book --}}
@forelse ( $book->borrows as $item )
<div class="media my-3 border-2">
    <img src="{{ asset('/template/dist/img/avatar.jpg') }}" class="mr-3 my-2" style="border-radius: 50%; height:150px; width:150px;">
    <div class="media-body">
        {{-- $item->users->name artinya mengambil data dari model borrow yg berelasi dengan tabel user yg nama fieldnya name --}}
        <h5 class="mt-0">{{ $item->users->name }}</h5>
        <p class="mt-0">Tanggal Pinjam Buku : {{ Carbon::parse( $item->tanggal_peminjaman)->format('d-F-Y') }}</p>
        <p class="mt-0">Tanggal Pengembalian Buku : {{Carbon::parse( $item->tanggal_pengembalian )->format('d-F-Y')}}</p>
    </div>
  </div>
@empty
    
@endforelse
<hr>


<form action="{{ route('create-borrow', $book) }}" method="post">
    @csrf
    <div class="card my-3">
        <p>Pinjam Buku</p>
        <input type="date" class="form-control col-3 my-1" name="tanggal_peminjaman" value="{{ date('Y-m-d') }}">
        @error('tanggal_peminjaman')   
            <small class="text-danger">tanggal peminjaman buku harus diisi</small><br>
        @enderror
        <p>Pengembalian Buku</p>
        <input type="date" class="form-control col-3" name="tanggal_pengembalian" value="{{ date('Y-m-d') }}">
        @error('tanggal_pengembalian')   
            <small class="text-danger">tanggal pengembalian buku harus diisi</small><br>
        @enderror
    </div>

    <input type="submit" value="pinjam" class="btn btn-secondary btn-sm my-2">
</form>
@endauth
<hr>

<div class="d-flex justify-content-end">
    <a href="{{ route('books.index') }}" class="btn btn-outline-info">Kembali</a>
</div>
@endsection