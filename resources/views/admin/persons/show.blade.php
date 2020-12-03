@extends('layouts.default')

@section('title')
    Detail Penduduk
@endsection

@section('content')
<div class="page-header">
    <h2 class="header-title">Penduduk</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Beranda</a>
            <a class="breadcrumb-item" href="#">Penduduk</a>
            <span class="breadcrumb-item active">Detail</span>
        </nav>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-md-flex align-items-center">
                        <div class="text-center text-sm-left ">
                            <div class="avatar avatar-image" style="width: 150px; height:150px">
                                <img src="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/images/avatars/thumb-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="text-center text-sm-left m-v-15 p-l-30">
                            <h2 class="m-b-5">{{$person->name}}</h2>
                            <p class="text-opacity font-size-13">Warga {{$person->status->name}}</p>
                            <p class="text-dark m-b-20">{{$person->job->name}} - {{$person->job->description}}</p>
                            {{-- <button class="btn btn-primary btn-tone">Contact</button> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="d-md-block d-none border-left col-1"></div>
                        <div class="col">
                            <ul class="list-unstyled m-t-10">
                                <li class="row">
                                    <p class="col-sm-6 col-6 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                        <span>Nomor RT: </span> 
                                    </p>
                                    <p class="col font-weight-semibold"> {{$person->rt_number}}</p>
                                </li>
                                <li class="row">
                                    <p class="col-sm-6 col-6 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                        <span>Jenis Kelamin: </span> 
                                    </p>
                                    <p class="col font-weight-semibold"> {{$person->gender  == "L" ? "Laki-laki" : "Perempuan"}}</p>
                                </li>
                                <li class="row">
                                    <p class="col-sm-6 col-6 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                        <span>Tempat Lahir: </span> 
                                    </p>
                                    <p class="col font-weight-semibold"> {{$person->place_of_birth}}</p>
                                </li>
                                <li class="row">
                                    <p class="col-sm-6 col-6 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                        <span>Tanggal Lahir: </span> 
                                    </p>
                                    <p class="col font-weight-semibold"> {{\Carbon\Carbon::parse($person->date_of_birth)->toFormattedDateString()}}</p>
                                </li>
                                <li class="row">
                                    <p class="col-sm-6 col-6 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                        <span>Umur: </span> 
                                    </p>
                                    <p class="col font-weight-semibold"> {{\Carbon\Carbon::parse($person->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan')}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Alamat Lengkap</h4>
                    <p>{{$person->address}}</p>
                    <hr>
                    <h4>Pekerjaan</h4>
                    <div class="m-t-20">
                        <div class="media m-b-30">
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">{{$person->job->name}}</h6>
                                <span class="font-size-13 text-gray">{{$person->job->description}}</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Pendidikan</h4>
                    <div class="m-t-20">
                        <div class="media m-b-30">
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">{{$person->education->name}}</h6>
                                <span class="font-size-13 text-gray">{{$person->education->description}}</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Status Ekonomi</h4>
                    <div class="m-t-20">
                        <div class="media m-b-30">
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">{{$person->economic->name}}</h6>
                                <span class="font-size-13 text-gray">{{$person->economic->description}}</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Status Warga</h4>
                    <div class="m-t-20">
                        <div class="media m-b-30">
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">{{$person->status->name}}</h6>
                                <span class="font-size-13 text-gray">{{$person->status->description}}</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Bukti Eviden</h4>
                    <div class="m-t-20">
                        <button class="btn btn-primary">Unduh</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection