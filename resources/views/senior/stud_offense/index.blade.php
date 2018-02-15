

@extends('senior.admin.layouts.dashboard')
@section('title', 'Student Offense | Prefect of Discipline Students Violation Monitoring System')
@section('content')
<div class="content">
    @if (Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
   <div class="container">
        <form class="cmxform form-horizontal tasi-form" action="{{ route('senior.offenseadd')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Dashboard</a></li>
                        <li>Student Offense</li>
                    </ol>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Select violation</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Category</th>
                                        <th>Violation</th>
                                        {{-- <th>1st Sanction</th>
                                        <th>2nd Sanction</th>
                                        <th>3rd Sanction</th>
                                        <th>4th Sanction</th>
                                        <th>5th Sanction</th>
                                        <th>6th Sanction</th>
                                        <th>7th Sanction</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($violations as $violation)
                                    <tr>
                                        <td><input type="radio" name="violation" id="{{ $violation->id }}"></td>
                                        <td>{{Config::get('constants.violation_name.'.$violation->category)}}</td>
                                        <td>{{ $violation->violation }}</td>
                                      {{--   <td>{{ $violation->first_sanction }}</td>
                                        <td>{{ $violation->second_sanction }}</td>
                                        <td>{{ $violation->third_sanction }}</td>
                                        <td>{{ $violation->fourth_sanction }}</td>
                                        <td>{{ $violation->fifth_sanction }}</td>
                                        <td>{{ $violation->sixth_sanction }}</td>
                                        <td>{{ $violation->seventh_sanction }}</td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

                
                          
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Form</h3></div>
                                    <div class="panel-body">
                                      
                                                <div class="form-group">
                                                    <label for="cname" class="control-label col-lg-2">Date &amp; Time Commit</label>
                                                    <div class="col-lg-10">  
                                                    <input type="datetime-local" name="date_commit" class="form-control" id="date_commit" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cemail" class="control-label col-lg-2">Category</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" class="form-control" id="category" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="curl" class="control-label col-lg-2">Student Offense</label>
                                                    <div class="col-lg-10">
                                                         <input type="text" name="student_offense" class="form-control" id="violation_name" required="required">
                                                    </div>
                                                </div>

                                               

                                                <div class="form-group">
                                                    <label for="ccomment" class="control-label col-lg-2">Reason</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" name="description" required="" aria-required="true"></textarea>
                                                        <input type="hidden" name="violation_id" id="violation_id">
                                                    </div>
                                                </div>

                                                 <div class="form-group">
                                                    <label for="field-1"  class="control-label col-lg-2" required="required">Select Student's</label>
                                                    <div class="col-lg-10">
                                                    <select size="5" class="select2-container select2 form-control" name="persons_involve[]" data-placeholder="Please select student" required>
                                                        <option selected disabled>Please select student</option>
                                                        @foreach($students as $student)
                                                            <option value="{{$student->student_id}}"> {!! Helper::fullname($student->first_name,$student->middle_name,$student->last_name) !!}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label for="ccomment" class="control-label col-lg-2">Sanction</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" name="sanction" required="" aria-required="true"></textarea>
                                                       {{--  <input type="hidden" name="violation_id" id="violation_id"> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button id="save_offense" class="btn btn-success waves-effect waves-light" type="submit"><span class="md md-check"></span> Save</button>
                                                
                                                    </div>
                                                </div>
                                       
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                        

                    
        </form>

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
        $("#stud_offense").on("click",function(e){
            e.preventDefault();
            var parent = $('input[name=student]:checked').parent().parent();
            var studentID = $(':nth-child(2)', parent).text();
            var first_name =  $(':nth-child(4)', parent).text();
            var middle_name =  $(':nth-child(5)', parent).text();
            var last_name =  $(':nth-child(6)', parent).text();
            var gender =  $(':nth-child(8)', parent).text();
            var adviser =  $(':nth-child(9)', parent).text();
            var section =  $(':nth-child(10)', parent).text();
            document.getElementById('stud_id').value = studentID;
            document.getElementById('first_name').value = first_name;
            document.getElementById('middle_name').value = middle_name;
            document.getElementById('last_name').value = last_name;
            document.getElementById('gender').value = gender;
            document.getElementById('adviser').value = adviser;
            document.getElementById('grade_section').value = section;
            $('#modal-offense').modal('toggle');
            $(':nth-child(1)', parent).prop('checked', false);
        });

        $('input:radio[name="violation"]').change(
                function(){
                    if ($(this).is(':checked')){
                        var parent = $(this).parent().parent();
                        var category = $(':nth-child(2)', parent).text();
                        var violation = $(':nth-child(3)', parent).text();
                        document.getElementById('category').value = category;
                        document.getElementById('violation_name').value = violation;
                        document.getElementById('violation_id').value = $(this).attr('id');
                    }
                });
    });
</script>
<style>
    .form-control.select2-container {
        height: 75px !important;
    }
</style>
@section('footer')
    @include('senior.stud_offense.includes.footer')
@show
@endsection


