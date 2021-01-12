@extends('layouts.default')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">$23,523</h2>
                            <p class="m-b-0 text-muted">Profit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">+ 17.21%</h2>
                            <p class="m-b-0 text-muted">Growth</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="anticon anticon-profile"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">3,685</h2>
                            <p class="m-b-0 text-muted">Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="anticon anticon-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">1,832</h2>
                            <p class="m-b-0 text-muted">Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Total Revenue</h5>
                        <div>
                            <div class="btn-group">
                                <button class="btn btn-default active">
                                    <span>Month</span>
                                </button>
                                <button class="btn btn-default">
                                    <span>Year</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-50" style="height: 330px">
                        <canvas class="chart" id="revenue-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="m-b-0">Customers</h5>
                    <div class="m-v-60 text-center" style="height: 200px">
                        <canvas class="chart" id="customers-chart"></canvas>
                    </div>
                    <div class="row border-top p-t-25">
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <h4 class="m-b-0">350</h4>
                                        <p class="m-b-0 muted">New</p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-secondary badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <h4 class="m-b-0">450</h4>
                                        <p class="m-b-0 muted">Returning</p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div class="media align-items-center">
                                    <span class="badge badge-warning badge-dot m-r-10"></span>
                                    <div class="m-l-5">
                                        <h4 class="m-b-0">100</h4>
                                        <p class="m-b-0 muted">Others</p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="m-b-0">$17,267</h2>
                            <p class="m-b-0 text-muted">Avg.Profit</p>
                        </div>
                        <div>
                            <span class="badge badge-pill badge-cyan font-size-12">
                                <span class="font-weight-semibold m-l-5">+5.7%</span>
                            </span>
                        </div>
                    </div>
                    <div class="m-t-50" style="height: 375px">
                         <canvas class="chart" id="avg-profit-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center">
                        <h5>Top Product</h5>
                        <div>
                            <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                        </div>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Sales</th>
                                        <th>Earning</th>
                                        <th style="max-width: 70px">Stock Left</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image rounded">
                                                    <img src="assets/images/others/thumb-9.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span>Gray Sofa</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>81</td>
                                        <td>$1,912.00</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm w-100 m-b-0">
                                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                                </div>
                                                <div class="m-l-10">
                                                    82
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image rounded">
                                                    <img src="assets/images/others/thumb-10.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span>Gray Sofa</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>26</td>
                                        <td>$1,377.00</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm w-100 m-b-0">
                                                    <div class="progress-bar bg-success" style="width: 61%"></div>
                                                </div>
                                                <div class="m-l-10">
                                                    61
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image rounded">
                                                    <img src="assets/images/others/thumb-11.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span>Wooden Rhino</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>71</td>
                                        <td>$9,212.00</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm w-100 m-b-0">
                                                    <div class="progress-bar bg-danger" style="width: 23%"></div>
                                                </div>
                                                <div class="m-l-10">
                                                    23
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image rounded">
                                                    <img src="assets/images/others/thumb-12.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span>Red Chair</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>79</td>
                                        <td>$1,298.00</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm w-100 m-b-0">
                                                    <div class="progress-bar bg-warning" style="width: 54%"></div>
                                                </div>
                                                <div class="m-l-10">
                                                    54
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image rounded">
                                                    <img src="assets/images/others/thumb-13.jpg" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span>Wristband</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>60</td>
                                        <td>$7,376.00</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm w-100 m-b-0">
                                                    <div class="progress-bar bg-success" style="width: 76%"></div>
                                                </div>
                                                <div class="m-l-10">
                                                    76
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
