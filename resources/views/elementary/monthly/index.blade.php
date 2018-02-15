
@extends('elementary.admin.layouts.dashboard')
@section('title', 'Monthly Reports | Prefect of Discipline Students Violation Monitoring System')
@section('content')
<div class="content">
    @if (Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
   <div class="container">
            <div class="row">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Monthly Reports</h3>
            </div>
        <div class="col-lg-6 pull-right">
            <div style="padding: 10px 5px;" class="pull-right btn-group dropdown-btn-group" >
               <!--  <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#student-add"><i class="md md-person-add"></i> Add Student</button> -->
            </div>
        </div>
       
        <div class="col-lg-9" style="margin-top: 10px;">
            <form action="{{ url('downloadExcel/xlsx') }}" method="get">
                {{csrf_field()}}
            <div style="padding: 10px 3px;" class="btn-group">
                <select class="form-control" id="section" name="section" required="required">
                    <option value="">Please select</option>
                    @foreach($sections as $section)
                        <option <?php if(isset($_GET['section'])):
                            echo $_GET['section']== $section->id ? "selected" : "";
                        endif; ?> value="{{$section->id}}">{{$section->grade}} - {{$section->section}}</option>
                    @endforeach
                </select>
            </div>
            <div style="padding: 10px 5px;" class="btn-group">
                <input type="month" name="month" id="month" required="required"/>

            </div>

             <div style="padding: 10px 5px;" class="btn-group">
                <button class="btn btn-info waves-effect waves-light">Export</button>
            </div>
           </form>
        </div>
            <div class="panel-body">
                <div class="row">
                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name Of Students</th>
                                    <th>Total</th>  
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{!! Helper::fullname($student->first_name,$student->middle_name,$student->last_name) !!}</td>
                                    <td>{{$student->count}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      
@section('footer')
    @include('elementary.monthly.includes.footer')
@show
@endsection