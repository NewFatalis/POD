{{-- Update Student --}}
<div id="offense-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Student offense Records</h4>
            </div>
            <form action="{{ route('senior.updateOffense')}}" method="post">
                {{csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name_stud" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Section</label>
                            <input type="text" class="form-control" id="section_stud" readonly>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Offense</label>
                            <input type="text" class="form-control" id="student_offense" name="student_offense">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Date & Time Commit</label>
                            <input type="datetime-local" class="form-control" name="date_commit" id="date_commit">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4" cols="44"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Sanction</label>
                        <textarea class="form-control" name="sanction" id="sanction" rows="4" cols="44"></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" id="hiddenOffense" class="form-control">
            <div class="modal-footer"><br>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button>
                <button type="submit" class="btn btn-purple waves-effect waves-light"><i class="md md-check"></i> Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>