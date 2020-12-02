@extends('layouts.default')

@section('title')
    Ubah Pekerjaan
@endsection

@section('content')
<div class="page-header">
    <h2 class="header-title">Pekerjaan</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-book m-r-5"></i>Beranda</a>
            <a class="breadcrumb-item" href="#">Pekerjaan</a>
            <span class="breadcrumb-item active">Ubah Pekerjaan</span>
        </nav>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <h4>Form Pekerjaan</h4>
        <p>Formulir ini untuk mengubah master data pekerjaan.</p>
        <form method="POST" action="{{route('jobs.update', $job->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="@error('name') error @endif">Nama Pekerjaan</label>
                <input type="text" class="form-control @error('name') is-invalid error @endif" id="name" placeholder="Nama Pekerjaan" name="name" value="{{ old('name') ?? $job->name }}" >
                @error('name')
                <div class="is-invalid">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Deskripsi</label>
                <textarea class="form-control" aria-label="With textarea" id="description" name="description">{{ old('description') ?? $job->description }}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Ubah</button>
            <a href="{{route('jobs.index')}}" class="btn btn-warning" >Kembali</a>
        </form>
    </div>
</div>


@endsection