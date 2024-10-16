@extends('layouts.main')

@section('judul')
    Edit Games
@endsection

@section('sub-judul')
    Form Edit
@endsection

@section('content')
<form method="POST" action="{{ route('update-game',  ['id' => $game->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" name="name" value="{{ $game->name }}" class="form-control" placeholder="Masukan Nama">
        
        <label for="exampleInputEmail1">gameplay</label>
        <textarea name="gameplay" id="" cols="30" rows="10" style="width: 100%" placeholder="masukan gameplay">{{ $game->gameplay }}</textarea>
        {{-- <input type="text" name="gameplay" value="" class="form-control"> --}}
    
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" name="developer" value="{{ $game->developer }}" class="form-control" placeholder="Masukan Nama Developer">
    
        <label for="exampleInputEmail1">tahun</label>
        <input type="text" name="year" value="{{ $game->year }}" class="form-control" placeholder="Masukan Tahun">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
