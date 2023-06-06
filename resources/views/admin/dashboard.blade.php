@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats statistic-box mb-4">
            <div
                class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="typcn typcn-device-tablet"></i>
                </div>
                <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Used Space
                </p>
                <h3 class="card-title fs-18 font-weight-bold">49/50
                    <small>GB</small>
                </h3>
            </div>
            <div class="card-footer p-3">
                <div class="stats">
                    <i class="typcn typcn-warning text-warning mr-2"></i>
                    <a href="#" class="warning-link">Get More Space...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats statistic-box mb-4">
            <div
                class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="typcn typcn-home-outline"></i>
                </div>
                <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Revenue
                </p>
                <h3 class="card-title fs-21 font-weight-bold">$34,245</h3>
            </div>
            <div class="card-footer p-3">
                <div class="stats">
                    <i class="typcn typcn-calendar-outline mr-2"></i>Last 24 Hours
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats statistic-box mb-4">
            <div
                class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="typcn typcn-info-outline"></i>
                </div>
                <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Fixed
                    Issues</p>
                <h3 class="card-title fs-21 font-weight-bold">75</h3>
            </div>
            <div class="card-footer p-3">
                <div class="stats">
                    <i class="typcn typcn-social-githu mr-2b"></i>Tracked from Github
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats statistic-box mb-4">
            <div
                class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="fab fa-twitter"></i>
                </div>
                <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Followers
                </p>
                <h3 class="card-title fs-21 font-weight-bold">+245</h3>
            </div>
            <div class="card-footer p-3">
                <div class="stats">
                    <i class="typcn typcn-upload mr-2"></i>Just Updated
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header bg-white">
    <!-- Body -->
    <div class="header-body mt-4">
        <div class="row align-items-end">
            <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1">
                    Overview
                </h6>

                <!-- Title -->
                <h1 class="header-title fs-21 font-weight-bold">
                    Performance
                </h1>

            </div>
            <div class="col-auto">
                <!-- Nav -->
                <ul class="nav nav-tabs header-tabs">
                    <li class="nav-item">
                        <a href="#" id="0" class="nav-link text-center active" data-toggle="tab">
                            <h6
                                class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1">
                                Earnings
                            </h6>
                            <h3 class="mb-0 fs-16 font-weight-bold">
                                $21.5k
                            </h3>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="1" class="nav-link text-center" data-toggle="tab">
                            <h6
                                class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1">
                                Sessions
                            </h6>
                            <h3 class="mb-0 fs-16 font-weight-bold">
                                79.9k
                            </h3>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="2" class="nav-link text-center" data-toggle="tab">
                            <h6
                                class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1">
                                Bounce
                            </h6>
                            <h3 class="mb-0 fs-16 font-weight-bold">
                                80.7%
                            </h3>
                        </a>
                    </li>
                </ul>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .header-body -->
    <!-- Footer -->
    <div class="header-footer">
        <div class="chart">
            <canvas id="forecast" width="300" height="100"></canvas>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script src="{{ asset('dashassets/dist/js/pages/home-demo.js') }}" defer></script>
@endsection
