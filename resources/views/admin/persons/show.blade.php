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
                            <p class="text-opacity font-size-13">@Marshallnich</p>
                            <p class="text-dark m-b-20">Frontend Developer, UI/UX Designer</p>
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
                                    <p class="col font-weight-semibold"> {{\Carbon\Carbon::parse($person->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan %d Hari')}}</p>
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
                    <h5>Alamat Lengkap</h5>
                    <p>{{$person->address}}</p>
                    <hr>
                    <h5>Experices</h5>
                    <div class="m-t-20">
                        <div class="media m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/others/adobe-thumb.png" alt="">
                            </div>
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">UI/UX Designer, Adobe Inc.</h6>
                                <span class="font-size-13 text-gray">Jul 2018</span>
                            </div>
                        </div>
                        <div class="media m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/others/amazon-thumb.png" alt="">
                            </div>
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">Product Developer, Amazon.com Inc.</h6>
                                <span class="font-size-13 text-gray">Jul-2017 - Jul 2018</span>
                            </div>
                        </div>
                        <div class="media m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/others/nvidia-thumb.png" alt="">
                            </div>
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">Interface Designer, Nvidia Corporation</h6>
                                <span class="font-size-13 text-gray">Jul-2016 - Jul 2017</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5>Education</h5>
                    <div class="m-t-20">
                        <div class="media m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/others/cambridge-thumb.png" alt="">
                            </div>
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">MSt in Social Innovation, Cambridge University</h6>
                                <span class="font-size-13 text-gray">Jul-2012 - Jul 2016</span>
                            </div>
                        </div>
                        <div class="media m-b-30">
                            <div class="avatar avatar-image">
                                <img src="assets/images/others/phillips-academy-thumb.png" alt="">
                            </div>
                            <div class="media-body m-l-20">
                                <h6 class="m-b-0">Phillips Academy</h6>
                                <span class="font-size-13 text-gray">Jul-2005 - Jul 2011</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5>Reviews (18)</h5>
                    <div class="m-t-20">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-h-0">
                                <div class="media m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">
                                            <a href="" class="text-dark">Lillian Stone</a>
                                        </h6>
                                        <span class="font-size-13 text-gray">28th Jul 2018</span>
                                    </div>
                                </div>
                                <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                <div class="star-rating m-t-15">
                                    <input type="radio" id="star1-5" name="rating-1" value="5" checked disabled/><label for="star1-5" title="5 star"></label>
                                    <input type="radio" id="star1-4" name="rating-1" value="4" disabled/><label for="star1-4" title="4 star"></label>
                                    <input type="radio" id="star1-3" name="rating-1" value="3" disabled/><label for="star1-3" title="3 star"></label>
                                    <input type="radio" id="star1-2" name="rating-1" value="2" disabled/><label for="star1-2" title="2 star"></label>
                                    <input type="radio" id="star1-1" name="rating-1" value="1" disabled/><label for="star1-1" title="1 star"></label>
                                </div>
                            </li>
                            <li class="list-group-item p-h-0">
                                <div class="media m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">
                                            <a href="" class="text-dark">Victor Terry</a>
                                        </h6>
                                        <span class="font-size-13 text-gray">28th Jul 2018</span>
                                    </div>
                                </div>
                                <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                <div class="star-rating m-t-15">
                                    <input type="radio" id="star2-5" name="rating-2" value="5" disabled/><label for="star2-5" title="5 star"></label>
                                    <input type="radio" id="star2-4" name="rating-2" value="4" checked disabled/><label for="star2-4" title="4 star"></label>
                                    <input type="radio" id="star2-3" name="rating-2" value="3" disabled/><label for="star2-3" title="3 star"></label>
                                    <input type="radio" id="star2-2" name="rating-2" value="2" disabled/><label for="star2-2" title="2 star"></label>
                                    <input type="radio" id="star2-1" name="rating-2" value="1" disabled/><label for="star2-1" title="1 star"></label>
                                </div>
                            </li>
                            <li class="list-group-item p-h-0">
                                <div class="media m-b-15">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h6 class="m-b-0">
                                            <a href="" class="text-dark">Wilma Young</a>
                                        </h6>
                                        <span class="font-size-13 text-gray">28th Jul 2018</span>
                                    </div>
                                </div>
                                <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                <div class="star-rating m-t-15">
                                    <input type="radio" id="star3-5" name="rating-3" value="5" checked disabled/><label for="star3-5" title="5 star"></label>
                                    <input type="radio" id="star3-4" name="rating-3" value="4" disabled/><label for="star3-4" title="4 star"></label>
                                    <input type="radio" id="star3-3" name="rating-3" value="3" disabled/><label for="star3-3" title="3 star"></label>
                                    <input type="radio" id="star3-2" name="rating-3" value="2" disabled/><label for="star3-2" title="2 star"></label>
                                    <input type="radio" id="star3-1" name="rating-3" value="1" disabled/><label for="star3-1" title="1 star"></label>
                                </div>
                            </li>
                        </ul> 
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection