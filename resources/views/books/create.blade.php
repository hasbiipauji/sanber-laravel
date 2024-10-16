@extends('layouts.main')
@section('title', 'Tambah buku')


@section('judul')
    Tambah Buku
@endsection


@section('content')
<form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>judul Buku</label>
      <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Masukan Judul">    
      @error('title')
          <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
        <label>Ringkasan</label>
        <textarea name="summary" id="" cols="30" rows="8" class="form-control"></textarea>
        @error('summary')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="image" class="form-control">
        <small>Jenis gambar yang diperbolehkan : jpg, jpeg, png</small><br>
        @error('image')
            <small class="text-danger">Gambar tidak boleh kosong, dan ukurannya max:4MB</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stock" class="form-control" id="exampleInputEmail1" placeholder="Masukan Stok yang tersedia">    
        @error('stock')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label>Kategori Buku</label>
        <select name="category_id" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            {{-- for dibawah untuk menampilkan kategori dari table categories, di pashing data lewat controller books dibagian create --}}
            @forelse ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @empty
                <option value="">Belum ada kategori yang dipilih</option>
            @endforelse
        </select> 
        @error('category_id')
            <small class="text-danger">Kategori tidak boleh kosong</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection