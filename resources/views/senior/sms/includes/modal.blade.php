{{-- Add Grade/Section --}}
<div id="contacts-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Contacts</h4> 
            </div>
            <form action="{{ route('senior.contactadd')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" id="field-3" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Contact no.</label>
                                <input type="text" name="contact_no" class="form-control" id="field-3" placeholder="Ex. 91912345678" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><br>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light"><i class="md md-check"></i> Submit</button>
                </div>
        </div> 
    </div>
</div>
{{-- Update Contact --}}
<div id="contacts-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Update Contacts</h4> 
            </div>
            <form action="{{ route('senior.contactupdate')}}" method="post">
                {{csrf_field()}}
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Name</label> 
                            <input type="text" class="form-control" id="name" name="name">
                        </div> 
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-3" class="control-label">Contact no.</label> 
                            <input type="text" class="form-control" id="contact_no" name="contact_no">
                            <input type="hidden" class="form-control" id="hiddenContact" name="id">
                        </div> 
                    </div> 
                </div> 
            </div>
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button> 
                <button type="submit" class="btn btn-purple waves-effect waves-light"><i class="md md-check"></i> Save Changes</button>
            </div>
            </form>
        </div> 
    </div>
</div>
{{-- Delete Contact --}}
<div id="contacts-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Delete Contacts</h4> 
            </div> 
            <div class="modal-body"> 
                <p>Are you sure you want to delete this contact ?</p>
            </div>
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"> Cancel</button> 
                <button type="submit" class="btn btn-danger waves-effect waves-light confirmation"><i class="ion-trash-b"></i> Delete</button>
            </div> 
        </div> 
    </div>
</div>