@extends('layouts.default')

@section('title')
    Ubah Penduduk
@endsection

@section('content')
<div class="page-header">
    <h2 class="header-title">Penduduk</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-book m-r-5"></i>Beranda</a>
            <a class="breadcrumb-item" href="#">Penduduk</a>
            <span class="breadcrumb-item active">Ubah Penduduk</span>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4>Form Penduduk</h4>
        <p>Formulir ini untuk mengubah master data penduduk.</p>
        <form method="POST" action="{{route('persons.update', $person->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name" class="@error('name') error @endif">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid error @endif" id="name" placeholder="Nama Lengkap" value="{{ old('name') ?? $person->name }}">
                    @error('name')
                        <div class="is-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="rt" class="@error('rt') error @endif">Nomor RT</label>
                    <input min="1" type="number" name="rt" class="form-control @error('rt') is-invalid error @endif" id="rt" placeholder="Nomor Rukun Tetangga" value="{{ old('rt') ?? $person->rt_number }}">
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
                        <option value="L" {{$person->gender == "L" ? 'selected' : ''}}>Laki-laki</option>
                        <option value="P" {{$person->gender == "P" ? 'selected' : ''}}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="religion">Agama</label>
                    <select class="select2" name="religion" id="religion">
                        <option value='islam' {{$person->religion == "islam" ? 'selected' : ''}}>Islam</option>
                        <option value='protestan' {{$person->religion == "protestan" ? 'selected' : ''}}>Protestan</option>
                        <option value='katolik' {{$person->religion == "katolik" ? 'selected' : ''}}>Katolik</option>
                        <option value='hindu' {{$person->religion == "hindu" ? 'selected' : ''}}>Hindu</option>
                        <option value='budha' {{$person->religion == "budha" ? 'selected' : ''}}>Buddha</option>
                        <option value='khonghucu' {{$person->religion == "khonghucu" ? 'selected' : ''}}>Khonghucu</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Tahun Tanggal Lahir</label>
                    <div class="input-affix">
                        <i class="prefix-icon anticon anticon-calendar"></i>
                        <input name="date_of_birth" type="text" class="form-control datepicker-input @error('date_of_birth') is-invalid error @endif" placeholder="Pilih Tanggal" value="{{$person->date_of_birth}}">
                    </div>
                    @error('date_of_birth')
                        <div class="is-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="place_of_birth" class="@error('place_of_birth') error @endif">Tempat Lahir</label>
                    <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid error @endif" id="place_of_birth" placeholder="Nama Pekerjaan" value="{{ old('place_of_birth') ?? $person->place_of_birth }}">
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
                            <option value="{{$education->id}}" {{$person->education->id == $education->id ? 'selected' : ''}}>{{$education->name}} - {{$education->description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="job">Pekerjaan</label>
                    <select class="select2" name="job" id="job">
                        @foreach ($jobs as $job)
                            <option value="{{$job->id}}" {{$person->job->id == $job->id ? 'selected' : ''}}>{{$job->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="economic">Status Ekonomi</label>
                    <select class="select2" name="economic" id="economic">
                        @foreach ($economic as $eco)
                            <option value="{{$eco->id}}" {{$person->economic->id == $eco->id ? 'selected' : ''}}>{{$eco->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="status">Status Warga</label>
                    <select class="select2" name="status" id="status">
                        @foreach ($status as $stat)
                            <option value="{{$stat->id}}" {{$person->status->id == $stat->id ? 'selected' : ''}}>{{$stat->name}}</option>
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
                    <textarea class="form-control" aria-label="With textarea" name="address" placeholder="Alamat Lengkap" id="address">{{$person->address}}</textarea>
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