@extends('senior.admin.layouts.dashboard')
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
                    <span class="counter">{{$students}}</span>
                    Number of Student
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-center text-uppercase text-white m-0">STUDENT MANAGEMENT</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bg-info bx-shadow">
                <span class="mini-stat-icon"><i class="ion-ios7-people"></i></span>
                <div class="mini-stat-info text-right">
                    <span class="counter">{{$advisers}}</span>
                    Number of Advisers
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-center text-uppercase text-white m-0">Advisers</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bg-pink bx-shadow">
                <span class="mini-stat-icon"><i class="ion-person-stalker"></i></span>
                <div class="mini-stat-info text-right">
                    <span class="counter">{{$users}}</span>
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
                    <span class="counter">{{$sections}}</span>
                    Number of Sections
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-center text-uppercase text-white m-0">Grade &amp; Section</h5>
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

    
   <!--  <div class="row">
        <div class="col-lg-8">
            <div class="portlet">
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Website Stats
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="portlet1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="website-stats" style="position: relative;height: 320px"></div>
                                <div class="row text-center m-t-30">
                                    <div class="col-sm-4">
                                        <h4 class="counter">86,956</h4>
                                        <small class="text-muted"> Weekly Report</small>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="counter">86,69</h4>
                                        <small class="text-muted">Monthly Report</small>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="counter">948,16</h4>
                                        <small class="text-muted">Yearly Report</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="portlet">
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Website Stats
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="portlet2" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="pie-chart">
                                    <div id="pie-chart-container" class="flot-chart" style="height: 320px">
                                    </div>
                                </div>

                                <div class="row text-center m-t-30">
                                    <div class="col-sm-6">
                                        <h4 class="counter">86,956</h4>
                                        <small class="text-muted"> Weekly Report</small>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 class="counter">86,69</h4>
                                        <small class="text-muted">Monthly Report</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>  
</div> -->
</div>  
@section('scripts')
    @include('senior.admin.includes.scripts')
@show
@endsection
