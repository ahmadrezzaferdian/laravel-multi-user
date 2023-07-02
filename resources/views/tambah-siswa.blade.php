@extends('layouts.app')
@section('title', 'Tambah Siswa')
@section('content')
<h3>Tambah Siswa</h3>

@if(Auth::user()->role == 'admin')
@if($errors->any())
        <div class="alert alert-danger">
            <ul>
             @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
@endif
<form action="/siswa/simpan" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group mb-4">
            <label for="id">Id Siswa</label>
            <input type="number" class="form-control @error( 'id') 
            is-invalid @enderror" value="{{old('id')}}" id="id" name="id" placeholder="Masukkan Id">
            @error('id')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
             <label for="nama">Nama Kelas</label>
            <select class="form-control select2 @error ('kelas_id') is-invalid @enderror" style="width: 100%;" name="kelas_id" id="kelas_id">
            <option value="">Pilih Kelas</option>
            @foreach ($kelas as $s)
            <option value="{{ $s->id }}"{{ old('kelas_id') == $s->id ? 'selected' : ''}} >{{ $s->nama_kelas }}</option>
            @endforeach
            </select>
            @error('kelas_id')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
         <div class="form-group mb-4">
            <label for="deskripsi">Nama Siswa</label>
            <input type="text" class="form-control @error('nama_siswa') 
            is-invalid @enderror" value="{{old('nama_siswa')}}" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa">
            @error('nama_siswa')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="deskripsi">Alamat</label>
            <input type="text" class="form-control @error('alamat') 
            is-invalid @enderror" value="{{old('alamat')}}" id="alamat" name="alamat" placeholder="Masukkan Alamat">
            @error('alamat')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
         <div class="form-group mb-4">
            <label for="deskripsi">Nomor Telepon</label>
            <input type="text" class="form-control @error ('phone_number') 
            is-invalid @enderror" value="{{old('phone_number')}}" id="phone_number" name="phone_number" placeholder="Masukkan Nomor Telepon">
            @error('phone_number')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="modal-footer mb-4">
        <a href="/siswa" data-bs-type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary"value="Simpan">Save changes</button>
    </div>
</form>
@endif

@if(Auth::user()->role == 'siswa')
@if($errors->any())
        <div class="alert alert-danger">
            <ul>
             @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
@endif
<form action="/siswa/siswa/simpan" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group mb-4">
            <label for="id">Id Siswa</label>
            <input type="number" class="form-control @error( 'id') 
            is-invalid @enderror" value="{{old('id')}}" id="id" name="id" placeholder="Masukkan Id">
            @error('id')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
             <label for="nama">Nama Kelas</label>
            <select class="form-control select2 @error ('kelas_id') is-invalid @enderror" style="width: 100%;" name="kelas_id" id="kelas_id">
            <option value="">Pilih Kelas</option>
            @foreach ($kelas as $s)
            <option value="{{ $s->id }}"{{ old('kelas_id') == $s->id ? 'selected' : ''}} >{{ $s->nama_kelas }}</option>
            @endforeach
            </select>
            @error('kelas_id')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
         <div class="form-group mb-4">
            <label for="deskripsi">Nama Siswa</label>
            <input type="text" class="form-control @error('nama_siswa') 
            is-invalid @enderror" value="{{old('nama_siswa')}}" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa">
            @error('nama_siswa')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="deskripsi">Alamat</label>
            <input type="text" class="form-control @error('alamat') 
            is-invalid @enderror" value="{{old('alamat')}}" id="alamat" name="alamat" placeholder="Masukkan Alamat">
            @error('alamat')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
         <div class="form-group mb-4">
            <label for="deskripsi">Nomor Telepon</label>
            <input type="text" class="form-control @error ('phone_number') 
            is-invalid @enderror" value="{{old('phone_number')}}" id="phone_number" name="phone_number" placeholder="Masukkan Nomor Telepon">
            @error('phone_number')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="modal-footer mb-4">
        <a href="/siswa/siswa" data-bs-type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary"value="Simpan">Save changes</button>
    </div>
</form>
@endif




@endsection