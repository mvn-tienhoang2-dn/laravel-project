<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="delete-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-modal-label">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="user-id-delete">
                <p>Do you want to delete this user ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirm-delete">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="edit-modal-label"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- FORM EDIT --}}
                <form enctype="multipart/form-data" id="update-form" method="POST" action="">
                    <input type="hidden" id="user-id-edit">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="col-md-12">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name">
                        @if ($errors->has('name'))
                            <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="edit-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-email" name="email">
                        @if ($errors->has('email'))
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="edit-status" class="form-label">Status</label>
                        <select class="form-select" name="" id="edit-status" name="status">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        @if ($errors->has('status'))
                            <p style="color:red">{{ $errors->first('status') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="edit-birthday" class="form-label" name="birthday">Birthday</label>
                        <input type="date" class="form-control" id="edit-birthday">
                        @if ($errors->has('birthday'))
                            <p style="color:red">{{ $errors->first('birthday') }}</p>
                        @endif
                    </div>
                    <label for="edit-avatar" class="form-label">Avatar</label>
                    <input type="file" multiple class="form-control" id="edit-upload-avatar" name="avatar">
                    <img src="" id="edit-avatar" alt="avatar" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info" id="confirm-edit">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="create-user-modal" tabindex="-1" aria-labelledby="create-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success ">
                <h5 class="modal-title text-white" id="create-modal-label">Create User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- FORM CREATE --}}
                <form enctype="multipart/form-data" method="post" id="form-create"
                    action="{{ route('api.user.store') }}">
                    @csrf
                    <div class="col-md-112">
                        <label for="name-input" class="form-label">Name</label>
                        <input type="text" required class="form-control" value="{{ old('name') }}" id="name-input"
                            name="name">
                        @if ($errors->has('name'))
                            <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="email-input" class="form-label">Email</label>
                        <input type="email" required class="form-control" value="{{ old('email') }}"
                            id="email-input" name="email">
                        @if ($errors->has('email'))
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="password-input" class="form-label">Password</label>
                        <input type="password" required class="form-control" value="{{ old('password') }}"
                            id="password-input" name="password">
                        @if ($errors->has('password'))
                            <p style="color:red">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="status-input" class="form-label">Status</label>
                        <select class="form-select" id="status-input" value="{{ old('status') }}" name="status">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        @if ($errors->has('status'))
                            <p style="color:red">{{ $errors->first('status') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="date-input" class="form-label">Birthday</label>
                        <input type="date" required class="form-control" value="{{ old('birthday') }}"
                            id="date-input" name="birthday">
                        @if ($errors->has('birthday'))
                            <p style="color:red">{{ $errors->first('birthday') }}</p>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="avatar-input" class="form-label">Avatar</label>
                        <input type="file" multiple class="form-control" value="{{ old('avatar') }}"
                            id="avatar-input" name="avatar">
                        <img src="" id="avatar-preview" class="form-control" alt="avatar">
                        @if ($errors->has('avatar'))
                            <p style="color:red">{{ $errors->first('avatar') }}</p>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success" type="submit" id="create-user">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
