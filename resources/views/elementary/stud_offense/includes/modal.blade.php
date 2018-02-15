{{-- Student Offense --}}
<div id="modal-offense" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Select Student Information</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Student ID</th>
                                <th>School-Year</th>
                                <th>First Name</th>
                                <th>Middle Name
                                <th>Last Name</th>
                                <th>Adviser</th>
                                <th>Grade &amp; Section</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($students as $student)
                                <tr id="{{$student->student_id}}">
                                    <td><input type="radio" name="student"></td>
                                    <td>{{$student->student_id}}</td>
                                    <td>{{$student->school_year}}</td>
                                    <td>{{$student->first_name}}</td>
                                    <td>{{$student->middle_name}}</td>
                                    <td>{{$student->last_name}}</td>
                                    <td>{{$student->adviser}}</td>
                                    <td>{{$student->section_id}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer"><br>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button>
                    <button type="button" id="stud_offense" class="btn btn-success waves-effect waves-light"><i class="md md-check"></i> Select Student</button>
                </div>
            </div>
        </div>
    </div>
</div>
