{{-- Add Student --}}
<div id="student-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Student</h4>
            </div>
            <form action="{{ route('senior.studentadd')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">ID No.</label>
                                <input type="text" name="student_id" class="form-control" id="student_id" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">School Year</label>
                                <select class="form-control" name="sy_id" id="sy_id" required="required">
                                    <option value="">Please select</option>
                                    @foreach($school_years as $school_year)
                                        <option value="{{$school_year->id}}" >{{$school_year->school_year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" id="middle_name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" id="field-2" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Semester</label>
                                <select class="form-control" id="semester" name="semester" required="required">
                                    <option value="">Please Select Semester</option>
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Grade &amp; Section</label>
                                <select class="form-control" id="section_id" name="section_id" required="required">
                                    <option value="">Please select</option>
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->grade}} - {{$section->section}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Class</label>
                                <select class="form-control" id="class" name="class" required="required">
                                    <option value="">Please Select Class</option>
                                    <option value="1">Day</option>
                                    <option value="2">Evening</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Adviser</label>
                                <input type="text" name="adviser" id="adviser" class="form-control" required="required">
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer"><br>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light"><i class="md md-check"></i> Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Update Student --}}
<div id="student-update" class="modal fade student-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Student</h4>
            </div>
            <form action="{{ route('senior.updateStudent')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">ID No.</label>
                                <input type="text" name="student_id" class="form-control" id="student_id" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">School Year</label>
                                <select class="form-control" name="sy_id" id="sy_id" required>
                                    <option value="">Please select</option>
                                    @foreach($school_years as $school_year)
                                        <option value="{{$school_year->id}}">{{$school_year->school_year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label" >First Name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" required="required">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" id="middle_name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Semester</label>
                                <select class="form-control" id="semester" name="semester" required="required">
                                    <option value="">Please Select Semester</option>
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Grade &amp; Section</label>
                                <select class="form-control" id="section_id" name="section_id" required>
                                    <option value="">Please select</option>
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->grade}} - {{$section->section}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Class</label>
                                <select class="form-control" id="class" name="class" required="required">
                                    <option value="">Please Select Class</option>
                                    <option value="1">Day</option>
                                    <option value="2">Evening</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Adviser</label>
                                <input type="text" name="adviser" class="form-control" id="adviser" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="hiddenStudent" class="form-control">
                <div class="modal-footer"><br>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button>
                    <button type="submit" class="btn btn-purple waves-effect waves-light"><i class="md md-check"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- View Attempts --}}
<div id="seniorview-attempt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Total Number Of Attempts</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Total:</label>
                            <input type="number" id="attempt" class="form-control" id="field-3" readonly="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><br>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

