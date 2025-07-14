@extends('layouts.backend')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="d-sm-flex align-items-baseline report-summary-header">
                    <h5 class="font-weight-semibold"></h5>
                  </div>
                </div>
              </div>
              <div class="row report-inner-cards-wrapper">
                <div class=" col-md -6 col-xl report-inner-card">
                  <div class="inner-card-text">
                    <span class="report-title">User</span>
                    <h4>{{$totalUser}}</h4>
                  </div>
                  <div class="inner-card-icon bg-success">
                    <i class="icon-rocket"></i>
                  </div>
                </div>
                <div class="col-md-6 col-xl report-inner-card">
                  <div class="inner-card-text">
                    <span class="report-title">Ruangan</span>
                    <h4>{{$totalRuang}}</h4>
                  </div>
                  <div class="inner-card-icon bg-danger">
                    <i class="icon-briefcase"></i>
                  </div>
                </div>
                <div class="col-md-6 col-xl report-inner-card">
                  <div class="inner-card-text">
                    <span class="report-title">Jadwal</span>
                    <h4>{{$totalJadwal}}</h4>
                  </div>
                  <div class="inner-card-icon bg-warning">
                    <i class="icon-globe-alt"></i>
                  </div>
                </div>
                <div class="col-md-6 col-xl report-inner-card">
                  <div class="inner-card-text">
                    <span class="report-title">Booking</span>
                    <h4>{{$totalBooking}}</h4>
                  </div>
                  <div class="inner-card-icon bg-primary">
                    <i class="icon-diamond"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      
    </div>
    <!-- content-wrapper ends -->

  </div>
@endsection