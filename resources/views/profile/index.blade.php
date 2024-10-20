@extends('layouts.main')

@section('title', 'Halaman Utama Kategori')


@section('judul')
   Profile
@endsection

@section('sub-judul')
<p>Form Edit Profile</p>
@endsection
@section('content')
<form action="{{ route('profiles.update', $detailProfile) }}" method="post">
    @csrf
    @method('PUT')
    {{-- ini diambil dari tabel users --}}
    <div class="form-group">
        <label for="">Nama</label>
        {{-- $detailProfile dari profileController, sedangkan users dari method di dalam model profile nya --}}
        <input type="text" name="age" class="form-control" placeholder="masukan nama disini" value="{{ $detailProfile->users->name}}" disabled>
    </div>
    <div class="form-group">
        <label for="">email</label>
        <input type="email" name="age" class="form-control" placeholder="masukan email disini" value="{{ $detailProfile->users->email }}" disabled>
    </div>

    <div class="form-group">
        <label>Biodata</label>
        <textarea name="bio" id="" style="width: 100%" class="form-control" placeholder="Masukan biodata">{{ $detailProfile->bio }}</textarea>
    </div>
    @error('bio')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Umur</label>
        <input type="number" name="age" class="form-control" placeholder="masukan umur disini" value="{{ $detailProfile->age }}">
    </div>
    @error('number')
        <small class="text-danger">{{ $message }}</small>
    @enderror

    <input type="submit" class="btn btn-outline-info" value="Update">
</form>
@endsection