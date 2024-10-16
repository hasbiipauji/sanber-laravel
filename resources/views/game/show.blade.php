@extends('layouts.main')

@section('judul')
    Detail Games
@endsection

{{-- @section('sub-judul')
    Form Edit
@endsection --}}

@section('content')

<div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="name" value="{{ $game->name }}" class="form-control" readonly>
    
    <label for="exampleInputEmail1">gameplay</label>
    <textarea name="gameplay" id="" cols="30" rows="10" style="width: 100%" readonly>{{ $game->gameplay }}</textarea>
    {{-- <input type="text" name="gameplay" value="" class="form-control" readonly> --}}

    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="developer" value="{{ $game->developer }}" class="form-control" readonly>

    <label for="exampleInputEmail1">tahun</label>
    <input type="text" name="year" value="{{ $game->year }}" class="form-control" readonly>
</div>
<a href="{{ route('game') }}" class="btn btn-success btn-sm my-3">Kembali</a>

@endsection
