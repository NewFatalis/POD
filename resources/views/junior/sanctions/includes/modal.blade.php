{{-- Add Sanction --}}
<div id="sanction-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Sanction</h4> 
            </div>
            <form action="{{ route('junior.addsanction') }}" method="post">
            {{csrf_field()}}
            <div class="modal-body"> 
                 <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="field-2" class="control-label">Sanction</label>
                            <textarea class="form-control autogrow" id="field-7" placeholder="Write something about sanction" style="overflow: hidden; word-wrap: break-word; resize: vertical; height: 104px" name="sanction"></textarea>                                                    
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

{{-- Update Sanction --}}
<div id="sanction-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Update Sanction</h4> 
            </div> 
            <form action="{{ route('junior.updateSanction')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body"> 
                    <div class="row">
                         <div class="form-group">
                            <div class="col-lg-12">
                                <label for="field-2" class="control-label">Sanction</label>
                                 <textarea class="form-control autogrow" id="field-7" placeholder="Write something about sanction" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px" name="sanction"></textarea>
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

{{-- Delete Sanction --}}
<div id="sanction-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Delete Sanction</h4> 
            </div> 
            <div class="modal-body"> 
                <p>Are you sure you want to delete this sanction ?</p>
            </div>
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"> Cancel</button> 
                <button id="sa-warning" type="button" class="btn btn-danger waves-effect waves-light confirmation"><i class="ion-trash-b"></i> Delete</button> 
            </div> 
        </div> 
    </div>
</div>