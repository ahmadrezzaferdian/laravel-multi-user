@extends('layouts.app')
@section('title', 'Tambah Kelas')
@section('content')
<h3>Tambah Kelas</h3>
 @if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $item)
        <li>{{ $item }}</li>
    @endforeach
    </ul>
</div>
@endif
<form action="/kelas/simpan" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group mb-4">
            <label for="id">Id</label>
            <input type="number" class="form-control @error( 'id')
            is-invalid @enderror" value="{{old('id')}}" id="id" name="id" placeholder="Masukkan Id">
            @error('id')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="nama">Nama Kelas</label>
            <input type="text" class="form-control @error( 'nama_kelas')
            is-invalid @enderror" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" value="{{ old('nama_kelas') }}">
            @error('nama_kelas')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="deskripsi">Deskripsi Kelas</label>
            <input type="text" class="form-control @error ('deskripsi')
            is-invalid @enderror" value="{{old('deskripsi')}}" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi">
            @error('deskripsi')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="modal-footer mb-4">
        <a href="/kelas" data-bs-type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary"value="Simpan">Save changes</button>
    </div>
</form>

@endsection