@extends('layouts.default')

@section('title')
    Tambah Penduduk
@endsection

@section('content')
<div class="page-header">
    <h2 class="header-title">Penduduk</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-book m-r-5"></i>Beranda</a>
            <a class="breadcrumb-item" href="#">Penduduk</a>
            <span class="breadcrumb-item active">Tambah Penduduk</span>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4>Form Penduduk</h4>
        <p>Formulir ini untuk menambah master data penduduk.</p>
        <form method="POST" action="{{route('persons.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name" class="@error('name') error @endif">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid error @endif" id="name" placeholder="Nama Lengkap" value="{{ old('name') }}">
                    @error('name')
                        <div class="is-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="rt" class="@error('rt') error @endif">Nomor RT</label>
                    <input min="1" type="number" name="rt" class="form-control @error('rt') is-invalid error @endif" id="rt" placeholder="Nomor Rukun Tetangga" value="{{ old('rt') }}">
                    @error('rt')
                        <div class="is-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="select2" name="gender" id="gender">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="religion">Agama</label>
                    <select class="select2" name="religion" id="religion">
                        <option value='islam'>Islam</option>
                        <option value='protestan'>Protestan</option>
                        <option value='katolik'>Katolik</option>
                        <option value='hindu'>Hindu</option>
                        <option value='buddha'>Buddha</option>
                        <option value='khonghucu'>Khonghucu</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Tahun Tanggal Lahir</label>
                    <div class="input-affix">
                        <i class="prefix-icon anticon anticon-calendar"></i>
                        <input name="date_of_birth" type="text" class="form-control datepicker-input @error('date_of_birth') is-invalid error @endif" placeholder="Pilih Tanggal">
                    </div>
                    @error('date_of_birth')
                        <div class="is-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="place_of_birth" class="@error('place_of_birth') error @endif">Tempat Lahir</label>
                    <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid error @endif" id="place_of_birth" placeholder="Nama Pekerjaan" value="{{ old('place_of_birth') }}">
                    @error('place_of_birth')
                        <div class="is-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="education">Pendidikan</label>
                    <select class="select2" name="education" id="education">
                        @foreach ($educations as $education)
                            <option value="{{$education->id}}">{{$education->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="job">Pekerjaan</label>
                    <select class="select2" name="job" id="job">
                        @foreach ($jobs as $job)
                            <option value="{{$job->id}}">{{$job->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="economic">Status Ekonomi</label>
                    <select class="select2" name="economic" id="economic">
                        @foreach ($economic as $eco)
                            <option value="{{$eco->id}}">{{$eco->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="status">Status Warga</label>
                    <select class="select2" name="status" id="status">
                        @foreach ($status as $stat)
                            <option value="{{$stat->id}}">{{$stat->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="eviden">Unggah Bukti</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="eviden" name="eviden" accept=".pdf, .jpg, .png, .jpeg">
                        <label class="custom-file-label @error('eviden') is-invalid error @endif" for="eviden">Pilih Berkas</label>
                    </div>
                    @error('eviden')
                        <div class="is-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="address">Alamat Lengkap</label>
                    <textarea class="form-control" aria-label="With textarea" name="address" placeholder="Alamat Lengkap" id="address"></textarea>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="{{route('persons.index')}}" class="btn btn-warning" >Kembali</a>

        </form>
    </div>
</div>

@endsection

@section('css')
    <link href="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/select2/select2.css" rel="stylesheet">
    <link href="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/select2/select2.min.js"></script>
    <script src="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script>
        $('.select2').select2();
        $('.datepicker-input').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection