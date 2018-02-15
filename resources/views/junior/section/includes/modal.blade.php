{{-- Add Grade/Section --}}
<div id="section-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Section</h4> 
            </div>
            <form action="{{ route('junior.sectionadd')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Grade</label>
                                <input type="text" name="grade" class="form-control" id="grade">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Section</label>
                                <input type="text" name="section" class="form-control" id="section">
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
{{-- Update Grade/Section --}}
<div id="section-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Update Section</h4> 
            </div>
            <form action="{{ route('junior.updateSection')}}" method="post">
                {{csrf_field()}}
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Grade</label> 
                            <input type="text" class="form-control" name="grade" id="grade">
                        </div> 
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-3" class="control-label">Section</label> 
                            <input type="text" name="section" class="form-control" id="section">
                        </div> 
                    </div>
                    <input type="hidden" name="id" id="hiddenSectionId">
                </div> 
            </div> 
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button> 
                <button type="submit" class="btn btn-purple waves-effect waves-light"><i class="md md-check"></i> Submit</button>
            </div>
            </form>
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
                <button type="submit" class="btn btn-danger waves-effect waves-light confirmation"><i class="ion-trash-b "></i> Delete</button>
            </div> 
        </div> 
    </div>
</div>