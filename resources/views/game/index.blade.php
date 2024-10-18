@extends('layouts.main')

@section('judul')
    Ini halaman Games
@endsection

@section('sub-judul')
    table games
@endsection

@section('content')
<a href="{{ route('create-game') }}" class="btn btn-info mb-3">Tambah</a>
@if ($games->isNotEmpty())
<table class="table">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Gameplay</th>
          <th scope="col">developer</th>
          <th scope="col">Tahun</th>
          <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
          @foreach ($games as $game)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $game->name }}</td>
                  <td>{{ $game->gameplay }}</td>
                  <td>{{ $game->developer }}</td>
                  <td>{{ $game->year }}</td>
                  <td> 
                      <form id="delete-form-{{ $game->id }}" action="{{ route('delete-game', ['id' => $game->id]) }}" method="POST">
                          <a href="{{ route('show-game', $game->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                          <a href="{{ route('edit-game', $game->id) }}" class="btn btn-info btn-sm">Edit</a>
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $game->id }})">Hapus</button>
                      </form>
                  </td>
              </tr>
            </tbody>          
        @endforeach
  </table>
@else
    <h3>Game Masih Kosong</h3>
@endif

@endsection
