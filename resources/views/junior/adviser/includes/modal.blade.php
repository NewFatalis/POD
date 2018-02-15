{{-- Add Adviser --}}
<div id="adviser-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Adviser</h4> 
            </div>
            <form action="{{ route('junior.adviseradd')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body"> 
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
            </div>
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button> 
                <button type="submit" class="btn btn-success waves-effect waves-light"><i class="md md-check"></i> Submit</button> 
            </div> 
            </form>
        </div> 
    </div>
</div>

{{-- Update Adviser --}}
<div id="adviser-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Update Adviser</h4> 
            </div> 
            <form action="{{ route('junior.updateAdviser')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body"> 
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
                </div>
                <input type="hidden" name="id" >
                <div class="modal-footer"><br> 
                    <button type="button" class="btn btn-default waves-effect close2" data-dismiss="modal"><i class="md md-close"></i> Close</button> 
                    <button type="submit" class="btn btn-success waves-effect waves-light"><i class="md md-check"></i> Submit</button> 
                </div> 
            </form>
        </div> 
    </div>
</div>

{{-- Delete Adviser --}}
<div id="adviser-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Delete Adviser</h4> 
            </div> 
            <div class="modal-body"> 
                <p>Are you sure you want to delete this adviser ?</p>
            </div>
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"> Cancel</button> 
                <button id="sa-warning" type="button" class="btn btn-danger waves-effect waves-light confirmation"><i class="ion-trash-b"></i> Delete</button> 
            </div> 
        </div> 
    </div>
</div>