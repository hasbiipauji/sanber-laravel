@extends('layouts.main')

@section('judul')
    Detail Kategori
@endsection

@section('content')

<div class="form-group">
    <label for="exampleInputEmail1">Nama Kategori : {{ $category->name }}</label>
    {{-- <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Masukan Nama" readonly>     --}}
</div>
<div class="row">
    {{-- books disini diambil dari function yg ada di model category --}}
    @forelse ($category->books as $item)
    <div class="col-4">
        <div class="card mb-3 shadow" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{ asset('img/'. $item->image) }}" alt="Foto Buku" class="img-thumbnail">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title font-weight-bolder">{{ $category->name }}</h5>
                <!-- Str::limit untuk me limit kata yang ditampilkan di dalam card-->
                <p class="card-text">{{ Str::limit($item->summary , '50') }}</p>
                <p class="card-text">Jumlah Stok : {{ $item->stock }}</p> 
                {{-- <p>Kategori buku : {{ $category->name }}</p> --}}
                {{-- diffForHumans untuk menampilkan waktu terakhir kali data diperbaharui --}}
                <small class="text-muted">Last updated {{ $item->updated_at->diffForHumans() }}</small>
                {{-- kalau pakai model, tidak perlu menangkap id yg akan dikirm, karena laravel otomatis akan mengetahui id mana yg dikirim --}}
                <a href="{{ route('books.show', $item) }}" class="btn btn-outline-primary btn-block rounded-lg mt-3">Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty
        <h2>Belum ada buku dengan kategori {{ $category->name }}</h2>
    @endforelse
</div>
{{-- <a href="{{ route('category') }}" class="btn btn-success btn-sm my-3">Kembali</a> --}}

@endsection
