@extends('layouts.main')
@section('title', 'Edit buku')


@section('judul')
    Edit Buku
@endsection


@section('content')
<form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label>judul Buku</label>
      <input type="text" name="title" class="form-control" value="{{ $book->title }}" id="exampleInputEmail1" placeholder="Masukan Judul">    
    </div>
    <div class="form-group">
        <label>Ringkasan</label>
        <textarea name="summary" id="" cols="30" rows="8" class="form-control">{{ $book->summary }}</textarea>
    </div>
    <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stock" value="{{ $book->stock }}" class="form-control" id="exampleInputEmail1" placeholder="Masukan Stok yang tersedia">    
    </div>
    <div class="form-group">
        <label>Kategori Buku</label>
        <select name="category_id" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            {{-- for dibawah untuk menampilkan kategori dari table categories, di pashing data lewat controller books dibagian create --}}
            @forelse ($categories as $item)
            {{-- disini masih pakai id karena pembuatan  controller categories tidak pakai --resource dan model secara langsung --}}
                @if ($item->id === $book->category_id)
                    <option value="{{ $item->id}}" selected>{{ $item->name }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif
            @empty
                <option value="">Belum ada kategori yang dipilih</option>
            @endforelse
        </select> 
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection