{{-- Add S.Y. --}}
<div id="sy-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add School Year</h4> 
            </div>
            <form action="{{ route('junior.syadd')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">School Year</label>
                                <input type="text" class="form-control" name="school_year" id="school_year" placeholder="E.g. 2017-2018">
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

{{-- Update S.Y. --}}
<div id="sy-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Update Year</h4> 
            </div>
            <form action="{{ route('junior.updateSY')}}" method="post">
                {{csrf_field()}}
            <div class="modal-body"> 
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label for="field-1" class="control-label">School Year</label> 
                            <input type="text" class="form-control" name="school_year" id="school_year" placeholder="E.g. 2017-2018">
                            <input type="hidden" name="id" id="hiddenSyId">
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


{{-- Delete S.Y. --}}
<div id="sy-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Year</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this school year ?</p>
            </div>
            <div class="modal-footer"><br>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"> Cancel</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light confirmation"><i class="ion-trash-b"></i> Delete</button>
            </div>
        </div>
    </div>
</div>