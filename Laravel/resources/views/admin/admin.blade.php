@extends('admin.layouts.master')

@section('content')
    <div class="row g-3 mb-3">
        <div class="col-xxl-6 col-xl-12">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card bg-transparent-50 overflow-hidden">
                        <div class="card-header position-relative">
                            <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url(../assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;">
                            </div>
                            <!--/.bg-holder-->

                            <div class="position-relative z-index-2">
                                <div>
                                    <h3 class="text-primary mb-1">Selamat datang, {{ auth()->user()->name }}!</h3>
                                    <p>Here’s what happening with your store today </p>
                                </div>
                                <div class="d-flex py-3">
                                    <div class="pe-3">
                                        <p class="text-600 fs--1 fw-medium">Today's visit </p>
                                        <h4 class="text-800 mb-0">14,209</h4>
                                    </div>
                                    <div class="ps-3">
                                        <p class="text-600 fs--1">Today’s total sales </p>
                                        <h4 class="text-800 mb-0">$21,349.29 </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-sm-6 col-md-4">
                  <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
                    </div>
                    <!--/.bg-holder-->
    
                    <div class="card-body position-relative">
                      <h6>Customers<span class="badge badge-soft-warning rounded-pill ms-2">-0.23%</span></h6>
                      <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="app/e-commerce/customers.html">See all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
                    </div>
                    <!--/.bg-holder-->
    
                    <div class="card-body position-relative">
                      <h6>Orders<span class="badge badge-soft-info rounded-pill ms-2">0.0%</span></h6>
                      <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="app/e-commerce/orders/order-list.html">All orders<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);">
                    </div>
                    <!--/.bg-holder-->
    
                    <div class="card-body position-relative">
                      <h6>Revenue<span class="badge badge-soft-success rounded-pill ms-2">9.54%</span></h6>
                      <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup='{"endValue":43594,"prefix":"$"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="index.html">Statistics<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
