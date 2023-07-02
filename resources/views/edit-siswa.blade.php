@extends('layouts.app')
@section('title', 'Edit Siswa')
@section('content')
<h3>Edit Siswa</h3>

@if(Auth::user()->role == 'admin')
@foreach ($siswa as $sur)
<form action="/siswa/update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group mb-4">
            <label for="id">Id Siswa</label>
            <input type="number" class="form-control" id="id" name="id" value="{{ $sur->id }}" readonly>
        </div>
        <div class="form-group mb-4">
             <label for="nama">Nama Kelas</label>
            <select class="form-control select2" style="width: 100%;" name="kelas_id" id="kelas_id"  >
            <option value="{{$sur->kelas->id}}">{{$sur->kelas->nama_kelas}}</option>
        @foreach ($kelas as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
        @endforeach
            </select>
        </div>

         <div class="form-group mb-4">
            <label for="deskripsi">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $sur->nama_siswa }}">
        </div>
        <div class="form-group mb-4">
            <label for="deskripsi">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $sur->alamat }}">
        </div>
        <div class="form-group mb-4">
                <label for="deskripsi">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $sur->phone_number}}">
            </div>
        </div>
        <div class="modal-footer mb-4">
            <a href="/siswa" data-bs-type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary"value="update">Save changes</button>
        </div>
    </div>
</form>
@endforeach
@endif

@if(Auth::user()->role == 'siswa')
@foreach ($siswa as $sur)
<form action="/siswa/siswa/update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group mb-4">
            <label for="id">Id Siswa</label>
            <input type="number" class="form-control" id="id" name="id" value="{{ $sur->id }}" readonly>
        </div>
        <div class="form-group mb-4">
             <label for="nama">Nama Kelas</label>
            <select class="form-control select2" style="width: 100%;" name="kelas_id" id="kelas_id"  >
            <option value="{{$sur->kelas->id}}">{{$sur->kelas->nama_kelas}}</option>
        @foreach ($kelas as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
        @endforeach
            </select>
        </div>

         <div class="form-group mb-4">
            <label for="deskripsi">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $sur->nama_siswa }}">
        </div>
        <div class="form-group mb-4">
            <label for="deskripsi">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $sur->alamat }}">
        </div>
        <div class="form-group mb-4">
                <label for="deskripsi">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $sur->phone_number}}">
            </div>
        </div>
        <div class="modal-footer mb-4">
            <a href="/siswa/siswa" data-bs-type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary"value="update">Save changes</button>
        </div>
    </div>
</form>
@endforeach
@endif





@endsection