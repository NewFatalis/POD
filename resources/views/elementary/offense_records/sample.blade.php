

@extends('elementary.admin.layouts.dashboard')
@section('title', 'Student Offense | Prefect of Discipline Students Violation Monitoring System')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Dashboard</a></li>
                        <li>Student Offense</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Student Offense Records</h3>
                        </div>
                        @section('modal')
                            @include('elementary.offense_records.includes.modal')
                        @show
                        <div class="col-lg-6">
                            <div style="padding: 10px 3px;" class="btn-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>6 - Compassion</option>
                                    <option>5 - Rizal</option>
                                    <option>3 - Mabini</option>
                                </select>
                            </div>
                            <div style="padding: 10px 5px;" class="btn-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>2017-2018</option>
                                    <option>2016-2017</option>
                                    <option>2015-2016</option>
                                </select>
                            </div>

                        </div>


                        <div class="panel-body">
                            <div class="row">
                                <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Adviser</th>
                                            <th>Grade & Section</th>
                                            <th>Date Commit</th>
                                            <th>Category</th>
                                            <th>Offense</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($offenses as $offense)
                                            <tr>
                                                <td>{{$offense->id}}</td>
                                                <td>{{$offense->student_id}}</td>
                                                <td>{{$offense->school_year}}</td>
                                                <td>{{$offense->section_id}}</td>
                                                <td>{{$offense->date_commit}}</td>
                                                <td>{{date("H:i:s",strtotime($offense->created_at))}}</td>
                                                <td>{{Config::get('constants.violation_name.'.$offense->category)}}</td>
                                                <td>{{$offense->student_offense}}</td>
                                                <td><button data-tooltip="tooltip" data-placement="top" data-original-title="Update Student" data-toggle="modal" data-target="#student-update" type="button" class="btn-xs btn btn-purple waves-effect waves-light m-b-5"><i class="md md-border-color"></i></button></td>
                                            </tr>
                                        @endforeach>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="visibility: hidden;" class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Responsive Table</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Age</th>
                                            <th>City</th>
                                        </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('footer')
    @include('elementary.student.includes.footer')
@show
@endsection
