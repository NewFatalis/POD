{{-- Add Violation --}}
<div id="violation-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Violation</h4> 
            </div>
            <form action="{{ route('junior.addviolation') }}" method="post">
            {{csrf_field()}}
            <div class="modal-body"> 
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label for="field-1" class="control-label">Category</label> 
                            <select class="form-control" id="exampleFormControlSelect1" name="category">
                                <option value="1">Minor Offense</option>
                                <option value="2">Major Offense</option>
                            </select>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Violation</label>
                            <textarea class="form-control autogrow" id="field-7" placeholder="Write something about violation" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px" name="violation"></textarea>                                                   
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

{{-- Update Violation --}}
<div id="violation-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Update Violation</h4> 
            </div> 
            <form action="{{ route('junior.updateViolation')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Category</label> 
                                <select class="form-control" id="exampleFormControlSelect2" name="category" required>
                                    <option value="1">Minor Offense</option>
                                    <option value="2">Major Offense</option>
                                </select>
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Violation</label>
                                <textarea class="form-control autogrow" id="field-7" placeholder="Write something about violation" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px" name="violation" required></textarea>      
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

{{-- Delete Violation --}}
<div id="violation-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Delete Violation</h4> 
            </div> 
            <div class="modal-body"> 
                <p>Are you sure you want to delete this violation ?</p>
            </div>
            <div class="modal-footer"><br> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"> Cancel</button> 
                <button id="sa-warning" type="button" class="btn btn-danger waves-effect waves-light confirmation"><i class="ion-trash-b"></i> Delete</button> 
            </div> 
        </div> 
    </div>
</div>