

@extends('senior.admin.layouts.dashboard')
@section('title', 'Student Management | Prefect of Discipline Students Violation Monitoring System')
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
                <div class="col-sm-12">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Students</a></li>
                    </ol>
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Student Offense Records</h3>
            </div>

        <div class="col-lg-8">
            <form action="{{ route('senior.offenseSearch')}}" method="get">
                {{csrf_field()}}
                <div style="padding: 10px 3px;" class="btn-group">
                    <select class="form-control" id="section" name="section">
                        <option value="">Please select Section</option>
                        @foreach($sections as $section)
                            <option <?php if(isset($_GET['section'])):
                                echo $_GET['section']== $section->id ? "selected" : "";
                            endif; ?> value="{{$section->id}}">{{$section->grade}} - {{$section->section}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="padding: 10px 5px;" class="btn-group">
                    <select class="form-control" name="sy" id="sy">
                        <option value="">Please select School Year</option>
                        @foreach($school_years as $school_year)
                            <option <?php if(isset($_GET['sy'])):
                                echo $_GET['sy']== $school_year->id ? "selected" : "";
                            endif; ?> value="{{$school_year->id}}">{{$school_year->school_year}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="padding: 10px 5px;" class="btn-group">
                    <select class="form-control" name="semester" id="semester">
                        <option value="">Please select Semester</option>
                        <option <?php if(isset($_GET['semester'])):
                            echo $_GET['semester']== 1 ? "selected" : "";
                        endif; ?> value="1">1st Semester</option>
                        <option <?php if(isset($_GET['semester'])):
                            echo $_GET['semester']== 2 ? "selected" : "";
                        endif; ?> value="2">2nd Semester</option>
                    </select>
                </div>

                <div style="padding: 10px 5px;" class="btn-group">
                    <select class="form-control" name="class" id="class">
                        <option value="">Please select Class</option>
                        <option <?php if(isset($_GET['class'])):
                            echo $_GET['class']== 1 ? "selected" : "";
                        endif; ?> value="1">Day</option>
                        <option <?php if(isset($_GET['class'])):
                            echo $_GET['class']== 2 ? "selected" : "";
                        endif; ?> value="2">Evening</option>
                    </select>
                </div>
                <button class="btn btn-info waves-effect waves-light" ><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
            @section('modal')
                @include('senior.offense_records.includes.modal')
            @show
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
                                <th>Class</th>
                                <th>Semester</th>
                                <th>Date & Time Commit</th>
                                <th>Offense</th>
                                <th>Description</th>
                                <th>Sanction</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $c = 1; ?>
                            @foreach($offenses as $offense)
                                <tr>
                                    <td>{{$c}}</td>
                                    <td>{{$offense->student_id}}</td>
                                    <td>{!! Helper::fullname($offense->first_name,$offense->middle_name,$offense->last_name) !!}</td>
                                    <td>{{$offense->adviser}}</td>
                                    <td>{{$offense->grade}} - {{$offense->section}}</td>
                                    <td>{{Config::get('constants.class.'.$offense->class_id)}}</td>
                                    <td>{{Config::get('constants.semester.'.$offense->semester_id)}}</td>
                                    <td>{{$offense->date_commit}}</td>
                                    <td>{{$offense->student_offense}}</td>
                                    <td>{{$offense->description}}</td>
                                    <td>{{$offense->sanction}}</td>
                                    <td><button data-tooltip="tooltip" data-placement="top" data-original-title="Update Student" data-toggle="modal" data-target="#offense-update" type="button" class="btn-xs btn btn-purple waves-effect waves-light m-b-5 update_offense"><i class="md md-border-color"></i></button></td>
                                    <input type="hidden" value="{{$offense->first_name}}">
                                    <input type="hidden" value="{{$offense->middle_name}}">
                                    <input type="hidden" value="{{$offense->last_name}}">
                                    <input type="hidden" value="{{$offense->id}}">
                                </tr>
                                 <?php $c++; ?>
                            @endforeach
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
 <script type="text/javascript">
        $(document).ready(function(){
            $('.delete').on('click', function(){
                var id = $(this).attr('id');
                $('.confirmation').data('id',id);
            });

            $('.confirmation').on('click', function(){
                window.location.href = "/elementary/delete/"+$(this).data('id');
            });
            $('.update_offense').on('click', function(){
                var parent = $(this).parent().parent();
                var id = $(':nth-child(16)', parent).val();
                var name = $(':nth-child(3)', parent).text();
                var studentID = $(':nth-child(2)', parent).html();
                var section =  $(':nth-child(5)', parent).text();
                var section_update = $('#offense-update #section_id option:contains("'+section+'")').val();
                var first_name =  $(':nth-child(12)', parent).val();
                var middle_name =  $(':nth-child(13)', parent).val();
                var last_name =  $(':nth-child(14)', parent).val();
                var adviser =  $(':nth-child(4)', parent).text();
                var offense = $(':nth-child(9)', parent).text();
                var description = $(':nth-child(10)', parent).text();
                var sanction = $(':nth-child(11)', parent).text();
                var date_commit = $(':nth-child(8)', parent).text().split(' ').join('T');

                $('#offense-update #student_offense').val(offense);
                $('#offense-update #date_commit').val(date_commit);;
                $('#offense-update #sanction').val(sanction);
                $('#offense-update #description').val(description);
                $('#offense-update #hiddenOffense').val(id);
                $('#offense-update #name_stud').val(name);
                $('#offense-update #section_stud').val(section);

            });
        });
    </script>
@section('footer')
    @include('senior.student.includes.footer')
@show
@endsection