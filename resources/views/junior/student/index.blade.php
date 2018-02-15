
@extends('junior.admin.layouts.dashboard')
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
                <h3 class="panel-title">List of Students</h3>
            </div>
        <div class="col-lg-6 pull-right">
            <div style="padding: 10px 5px;" class="pull-right btn-group dropdown-btn-group" >
                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#student-add"><i class="md md-person-add"></i> Add Student</button>
            </div>
        </div>
        @section('modal')
            @include('junior.student.includes.modal')
        @show
        <div class="col-lg-6">
            <form action="{{ route('junior.studSearch')}}" method="get">
                {{csrf_field()}}
                <div style="padding: 10px 3px;" class="btn-group">
                    <select class="form-control" id="section" name="section">
                        <option value="">Please select</option>
                        @foreach($sections as $section)
                            <option <?php if(isset($_GET['section'])):
                                echo $_GET['section']== $section->id ? "selected" : "";
                            endif; ?> value="{{$section->id}}">{{$section->grade}} - {{$section->section}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="padding: 10px 5px;" class="btn-group">
                    <select class="form-control" name="sy" id="sy">
                        <option value="">Please select</option>
                        @foreach($school_years as $school_year)
                            <option <?php if(isset($_GET['sy'])):
                                echo $_GET['sy']== $school_year->id ? "selected" : "";
                            endif; ?> value="{{$school_year->id}}">{{$school_year->school_year}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-info waves-effect waves-light" ><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
            <div class="panel-body">
                <div class="row">
                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>School-Year</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Adviser</th>
                                    <th>Grade &amp; Section</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $c = 1; ?>
                            @foreach($students as $student)
                                <tr>
                                     <td>{{$c}}</td>
                                        <td>{{$student->student_id}}</td>
                                        <td>{{$student->school_year}}</td>
                                        <td>{{$student->first_name}}</td>
                                        <td>{{$student->middle_name}}</td>
                                        <td>{{$student->last_name}}</td>
                                        <td>{{$student->adviser}}</td>
                                        <td>{{$student->grade}} - {{$student->section}}</td>
                                        <td><button data-tooltip="tooltip" data-placement="top" data-original-title="Update Student" data-toggle="modal" data-target="#student-update" type="button" class="btn-xs btn btn-purple waves-effect waves-light m-b-5 update" id="{{ $student->id }}"><i class="md md-border-color"></i></button>
                                            <button data-tooltip="tooltip" data-placement="top" data-original-title="View Number Of Attempts"  type="button" class="btn-xs btn btn-info waves-effect waves-light m-b-5 total_attempts"><i class="md-remove-red-eye "></i></button></td>
                                        <input type="hidden" value="{{$student->sy_id}}">
                                        <input type="hidden" value="{{$student->id}}">
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
        $('.update').on('click', function(){
            var parent = $(this).parent().parent();
            var id = $(':nth-child(11)', parent).val();
            var studentID = $(':nth-child(2)', parent).html();
            var school_year = $(':nth-child(3)', parent).text();
            var first_name =  $(':nth-child(4)', parent).text();
            var middle_name =  $(':nth-child(5)', parent).text();
            var last_name =  $(':nth-child(6)', parent).text();
            var adviser =  $(':nth-child(7)', parent).text();
            var section =  $(':nth-child(8)', parent).text();
            var contact_no = $(':nth-child(11)', parent).val();
            var sy = $('#student-update #sy_id option:contains("'+school_year+'")').val();
            var section_update = $('#student-update #section_id option:contains("'+section+'")').val();
            $('#student-update #student_id').val(studentID);
            $('#student-update #first_name').val(first_name);
            $('#student-update #middle_name').val(middle_name);
            $('#student-update #last_name').val(last_name);
            $('#student-update #adviser').val(adviser);
            $('#student-update #sy_id').val(sy);
            $('#student-update #section_id').val(section_update);
            $('#student-update #hiddenStudent').val(id);
            $('#student-update #contact_no').val(contact_no);
        });
        $('.total_attempts').on('click',function(e){

            e.preventDefault();
            var parent = $(this).parent().parent();
            var studentID = $(':nth-child(2)', parent).html();
            $.ajax({
                method: 'POST',
                url: '/junior/student/attempt',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'studID': studentID
                },
                dataType: 'json'
            }).done(function(response) {
                if(response.count) {
                    var count_attempt = parseInt(response.count);
                    $('#jrview-attempt #attempt').val(count_attempt);
                    $('#jrview-attempt').modal('show');
                } else {
                    $('#jrview-attempt #attempt').val(0);
                    $('#jrview-attempt').modal('show');
                }
            });

        });
    });
</script>


@section('footer')
    @include('junior.student.includes.footer')
@show
@endsection