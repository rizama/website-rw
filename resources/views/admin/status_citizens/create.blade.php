@extends('layouts.default')

@section('title')
    Tambah Status Warga
@endsection

@section('content')
<div class="page-header">
    <h2 class="header-title">Status Warga</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-book m-r-5"></i>Beranda</a>
            <a class="breadcrumb-item" href="#">Status Warga</a>
            <span class="breadcrumb-item active">Tambah Status Warga</span>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4>Form Status Warga</h4>
        <p>Formulir ini untuk menambah master data status warga.</p>
        <form method="POST" action="{{route('status.store')}}">
            @csrf
            <div class="form-group">
                <label for="name" class="@error('name') error @endif">Status Warga</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid error @endif" id="name" placeholder="Status Warga" value="{{ old('name') }}">
                @error('name')
                    <div class="is-invalid">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" aria-label="With textarea" name="description" placeholder="Deskripsi Status Warga" id="description"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="{{route('status.index')}}" class="btn btn-warning" >Kembali</a>
        </form>
    </div>
</div>


@endsection