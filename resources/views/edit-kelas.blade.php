@extends('layouts.app')
@section('title', 'Edit Kelas ')
@section('content')
<h3>Edit Kelas</h3>
@foreach ($kls as $b)
<form action="/kelas/update" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" id="id" name="id" value="{{ $b->id }}">
    <div class="modal-body">
        <div class="form-group mb-4">
            <label for="id">Id</label>
            <input type="number" class="form-control" id="id" name="id" value="{{ $b->id }}" readonly>
        </div>
        <div class="form-group mb-4">
            <label for="nama">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $b->nama_kelas }}" >
        </div>
        <div class="form-group mb-4">
            <label for="deskripsi">Deskripsi Kelas</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $b->deskripsi }}">
        </div>
    </div>
    <div class="modal-footer mb-4">
        <a href="/kelas" data-bs-type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary"value="update">Save changes</button>
    </div>
</form>
@endforeach





@endsection