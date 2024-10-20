@extends('layouts.main')

@section('judul')
    Tambah Games
@endsection

@section('sub-judul')
    Form Tambah
@endsection

@section('content')
<form method="POST" action="{{ route('store-game') }}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama">    
      @error('name')
          <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Gameplay</label>
        <textarea name="gameplay" class="form-control" cols="20" rows="5" style="width: 100%;" placeholder="masukan gameplay disini"></textarea>
        @error('gameplay')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Developer</label>
        <input type="text" name="developer" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Developer">    
        @error('developer')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Tahun</label>
        <input type="number" name="year" class="form-control" id="exampleInputEmail1" placeholder="Masukan tahun">    
        @error('year')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection
