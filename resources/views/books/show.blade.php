@extends('layouts.main')
@section('title', 'Detail buku')


@section('judul')
    Detail Buku
@endsection

@section('content')

<img src="{{ asset('img/'.$book->image) }}" alt="" style="width: 100%; max-height: 450px; object-fit: cover; object-position: center;">
<h2 class="font-weight-bolder">{{ $book->title }}</h2>
<p>{{ $book->summary }}</p>
<p>Jumlah Stok Buku : {{ $book->stock }}</p>





<a href="{{ route('books.index') }}" class="btn btn-outline-info">Kembali</a>
@endsection