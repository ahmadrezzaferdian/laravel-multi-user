@extends('layouts.app')
@section('title', 'Kelas')
@section('content')
<h3>Halaman Kelas</h3>
<div class="row mt-2">
{{-- @include('alert') --}}
    <div class="w-25 col-xl-3 col-lg-3">
        <a class="btn btn-primary" href="/kelas/tambah-kelas" role="button">
            Tambah Kelas
        </a>
    </div>
    <div class="col-xl-9 col-lg-9">
        <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="/carikelas">
        <div class="input-group">
            <input type="search" class="form-control bg-white border-1 small" placeholder="Cari" aria-label="Search" name="cari" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<br>
<table class="table col-xl-12 col-lg-12">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kelas as $u)
        <tr>
            <th scope="row">{{ $u -> id}}</th>
            <td>{{$u->nama_kelas}}</td>
            <td>{{$u->deskripsi}}</td>
            <td>
                <a class="btn btn-primary" href="/kelas/{{$u->id}}/edit" role="button">
                    Edit
                </a>
                <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModalKelas{{$u->id}}" href="#" role="button">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<span style="float: right;">
    {{ $kelas->links() }}
</span>

@endsection
@section('deleteModal')
    <!-- delete Modal-->
    @foreach ($kelas as $u)
    <div class="modal fade" id="deleteModalKelas{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you agree.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="/kelas/{{$u->id}}/delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
