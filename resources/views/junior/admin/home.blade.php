@extends('junior.admin.layouts.dashboard')
@section('title', 'Dashboard | Prefect of Discipline Students Violation Monitoring System')
@section('content')
  <div class="content">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">P.O.D.</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-purple">
                <span class="mini-stat-icon"><i class="ion-ios7-paper"></i></span>
                <div class="mini-stat-info text-right">
                    <span class="counter">15852</span>
                    Number of Violations
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-center text-uppercase text-white m-0">Violations</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bg-info bx-shadow">
                <span class="mini-stat-icon"><i class="ion-ios7-people"></i></span>
                <div class="mini-stat-info text-right">
                    <span class="counter">956</span>
                    Number of Students
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-center text-uppercase text-white m-0">Student Management</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bg-pink bx-shadow">
                <span class="mini-stat-icon"><i class="ion-person-stalker"></i></span>
                <div class="mini-stat-info text-right">
                    <span class="counter">20544</span>
                    Number of Users 
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-center text-uppercase text-white m-0">User Management</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bg-success bx-shadow">
                <span class="mini-stat-icon"><i class="ion-android-book"></i></span>
                <div class="mini-stat-info text-right">
                    <span class="counter">5210</span>
                    Number of Records
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-center text-uppercase text-white m-0">Student Offense Records</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="row">
        <div style="margin-top: 5%;" class="col-md-10 col-md-offset-1">
            <div class="box box-special">
                <div class="box-header with-footer">
                    <div class="box-body">
                      {!! $chart->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>  
@section('scripts')
    @include('junior.admin.includes.scripts')
@show
@endsection
