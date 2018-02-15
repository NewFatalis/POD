{{-- Add Users --}}
<div id="user-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add User</h4>
            </div>
            <form method="POST" action="{{ route('elem.userAdd') }}">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" id="field-1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Role</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                <option value="administrator">Administrator</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Name</label>
                            <input type="text" name="username" class="form-control" id="field-1">
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

{{-- Update Users --}}
<div id="user-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update User</h4>
            </div>
            <form method="POST" action="{{ route('elem.userUpdate') }}">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="administrator">Administrator</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Name</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="password" id="Password" class="form-control" placeholder="6 - 15 Characters">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="RePassword">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="RePassword" class="form-control" placeholder="6 - 15 Characters">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id">
            <div class="modal-footer"><br>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="md md-close"></i> Close</button>
                <button type="submit" class="btn btn-purple waves-effect waves-light"><i class="md md-check"></i> Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete User --}}
<div id="user-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete User</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user ?</p>
            </div>
            <div class="modal-footer"><br>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"> Cancel</button>
                <button type="button" class="btn btn-danger waves-effect waves-light confirmation"><i class="ion-trash-b"></i> Delete</button>
            </div>
        </div>
    </div>
</div>