@extends('layouts.main')

@section('title', 'Halaman Utama Buku')


@section('judul')
    Ini halaman Buku
@endsection

@section('content')
{{-- auth untuk autentikasi tombol tambah --}}
@auth
<a href="{{ route('books.create') }}" class="btn btn-info mb-3">Tambah</a>
@endauth
<div class="row">
  @forelse ($books as $item)    
  <div class="col-4">
    <div class="card mb-3 shadow" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="{{ asset('img/'. $item->image) }}" alt="Foto Buku" class="img-thumbnail">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title font-weight-bolder">{{ $item->title }}</h5>
            <!-- Str::limit untuk me limit kata yang ditampilkan di dalam card-->
            <p class="card-text">{{ Str::limit($item->summary , '50') }}</p>
            <p class="card-text">Jumlah Stok : {{ $item->stock }}</p>
            {{-- $item disini pakai one to many, categories itu nama method di model books --}}
            <span class="badge badge-success">{{ $item->categories->name }}</span><br>
            {{-- diffForHumans untuk menampilkan waktu terakhir kali data diperbaharui --}}
            <small class="text-muted">Last updated {{ $item->updated_at->diffForHumans() }}</small>
            {{-- kalau pakai model, tidak perlu menangkap id yg akan dikirim, karena laravel otomatis akan mengetahui id mana yg dikirim --}}
            <a href="{{ route('books.show', $item) }}" class="btn btn-outline-primary btn-block rounded-lg mt-3">Detail</a>
            @auth       
            <div class="row my-2">
              <div class="col">
                <a href="{{ route('books.edit', $item) }}" class="btn btn-outline-warning btn-block">Edit</a>
              </div>
              <div class="col">
                <form id="delete-form-{{ $item->id }}" action="{{ route('books.destroy', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-outline-danger btn-block" type="button" onclick="confirmDelete({{ $item->id }})">Hapus</button>
                </form>              
              </div>
            </div>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>
  @empty
      <h3>Data Buku Kosong</h3>
  @endforelse
</div>
@endsection
