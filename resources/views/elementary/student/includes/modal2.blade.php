{{-- Add Student --}}
<div id="student-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Student</h4> 
            </div>
            <form action="{{ route('elem.studentadd')}}" method="post">
                {{csrf_field()}}
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">ID No.</label>
                                <input type="text" name="student_id" class="form-control" id="student_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">School Year</label>
                                <select class="form-control" name="sy_id" id="sy_id">
                                    <option selected disabled>Please select school year</option>
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
                                <label for="field-1" class="control-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control">
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
                                <input type="text" name="last_name" id="last_name" class="form-control" id="field-2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Age</label>
                                <input type="number" name="age" id="age" class="form-control" id="field-1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option selected disabled>Please select gender</option>
                                    <option value="{{Config::get('constants.gender_name.male')}}">Male</option>
                                    <option value="{{Config::get('constants.gender_name.female')}}">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Adviser</label>
                                <input type="text" name="adviser" id="adviser" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Grade &amp; Section</label>
                                <select class="form-control" id="section_id" name="section_id">
                                    <option selected disabled>Please select Grade & Section</option>
                                @foreach($sections as $section)
                                    <option value="{{$section->grade}} - {{$section->section}}">{{$section->grade}} - {{$section->section}}</option>
                                @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control">
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
            <form action="{{ route('elem.updateStudent')}}" method="post">
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
                                <select class="form-control" name="sy_id" id="sy_id">
                                    <option selected disabled>Please select school year</option>
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
                                <label for="field-1" class="control-label">Age</label>
                                <input type="number" name="age" class="form-control" id="age" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option selected disabled>Please select gender</option>
                                    <option value="{{Config::get('constants.gender_name.male')}}">Male</option>
                                    <option value="{{Config::get('constants.gender_name.female')}}">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Adviser</label>
                                <input type="text" name="adviser" class="form-control" id="adviser" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Grade &amp; Section</label>
                                <select class="form-control" id="section_id" name="section_id">
                                    <option selected disabled>Please select Grade & Section</option>
                                    @foreach($sections as $section)
                                        <option value="{{$section->grade}} - {{$section->section}}">{{$section->grade}} - {{$section->section}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Address</label>
                                <input type="text" name="address" class="form-control" id="address" required="required">
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


{{-- Add Grade/Section --}}
<div id="section-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Section</h4> 
            </div> 
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Grade</label> 
                            <input type="text" class="form-control" id="field-3">
                        </div> 
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-3" class="control-label">Section</label> 
                            <input type="text" class="form-control" id="field-3"> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button> 
                <button type="button" class="btn btn-success waves-effect waves-light"><i class="md md-check"></i> Submit</button> 
            </div> 
        </div> 
    </div>
</div>

{{-- Update Grade/Section --}}
<div id="section-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Update Section</h4> 
            </div> 
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Grade</label> 
                            <input type="text" class="form-control" id="field-3"> 
                        </div> 
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-3" class="control-label">Section</label> 
                            <input type="text" class="form-control" id="field-3"> 
                        </div> 
                    </div> 
                </div> 
            </div> 
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button> 
                <button type="button" class="btn btn-purple waves-effect waves-light"><i class="md md-check"></i> Submit</button> 
            </div> 
        </div> 
    </div>
</div>

{{-- Delete Grade/Section --}}
<div id="section-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Delete Section</h4> 
            </div> 
            <div class="modal-body"> 
                <p>Are you sure you want to delete this section ?</p>
            </div>
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"> Cancel</button> 
                <button type="button" class="btn btn-danger waves-effect waves-light confirmation"><i class="ion-trash-b"></i> Delete</button>
            </div> 
        </div> 
    </div>
</div>

