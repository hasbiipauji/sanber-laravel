@extends('layouts.main')

@section('title', 'Halaman Utama Kategori')


@section('judul')
    Ini halaman kategori
@endsection

@section('sub-judul')
    table
@endsection

@section('content')
<a href="{{ route('create-category') }}" class="btn btn-info mb-3">Tambah</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      @forelse ($categories as $category)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $category->name }}</td>
        <td>
          {{-- <a href="#" class="btn btn-danger btn-sm">Hapus</a> --}}
          <form id="delete-form-{{ $category->id }}" action="{{ route('delete-category', ['id' => $category->id]) }}" method="POST">
              <a href="{{ route('show-category', $category->id) }}" class="btn btn-success btn-sm">Lihat</a>
              <a href="{{ route('edit-category', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $category->id }})">Hapus</button>
            </form>
        </td>
      </tr>
      @empty
          <h2>Kategori Kosong</h2>
      @endforelse
    </tbody>
  </table>
@endsection
