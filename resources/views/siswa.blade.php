@extends('layouts.app')
@section('title', 'Siswa')
@section('content')
<h3>Halaman Siswa</h3>
@if(Auth::user()->role == 'admin')
<div class="row mt-2">
{{-- @include('alert') --}}
    <div class="w-25 col-xl-3 col-lg-3">
        <a class="btn btn-primary" href="/siswa/tambah-siswa" role="button">
            Tambah Siswa
        </a>
    </div>
    <div class="col-xl-9 col-lg-9">
        <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="/carisiswa">
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

<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $u)
        <tr>
            <th scope="row">{{ $u -> id}}</th>
            <td>{{$u->kelas->nama_kelas}}</td>
            <td>{{$u->nama_siswa}}</td>
            <td>{{$u->alamat}}</td>
            <td>{{$u->phone_number}}</td>
            <td>
                <a class="btn btn-primary" href="/siswa/{{$u->id}}/edit" role="button">
                    Edit
                </a>
                <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModalSiswa{{$u->id}}" href="#" role="button">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<span style="float: right;">
    {{ $siswa->links() }}
</span>
@elseif(Auth::user()->role == 'siswa')
<div class="row mt-2">
{{-- @include('alert') --}}
    <div class="w-25 col-xl-3 col-lg-3">
        <a class="btn btn-primary" href="/siswa/siswa/tambah-siswa" role="button">
            Tambah Siswa
        </a>
    </div>
    <div class="col-xl-9 col-lg-9">
        <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="/carisiswa">
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

<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $u)
        <tr>
            <th scope="row">{{ $u -> id}}</th>
            <td>{{$u->kelas->nama_kelas}}</td>
            <td>{{$u->nama_siswa}}</td>
            <td>{{$u->alamat}}</td>
            <td>{{$u->phone_number}}</td>
            <td>
                <a class="btn btn-primary" href="/siswa/siswa/{{$u->id}}/edit" role="button">
                    Edit
                </a>
                <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModalSiswa{{$u->id}}" href="#" role="button">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<span style="float: right;">
    {{ $siswa->links() }}
</span>
@endif
@endsection

@section('deleteModal')
@if(Auth::user()->role == 'admin')
    <!-- delete Modal-->
    @foreach ($siswa as $u)
    <div class="modal fade" id="deleteModalSiswa{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <a class="btn btn-danger" href="/siswa/{{$u->id}}/delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@elseif(Auth::user()->role == 'siswa')
<!-- delete Modal-->
    @foreach ($siswa as $u)
    <div class="modal fade" id="deleteModalSiswa{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <a class="btn btn-danger" href="/siswa/siswa/{{$u->id}}/delete">Delete</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
@endsection