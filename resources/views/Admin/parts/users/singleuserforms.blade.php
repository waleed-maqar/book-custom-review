<div class="p-2">
    @if ($user->is_admin)
        @admin_with_role('supervisor')
            <div class="p-3">
                @if (Auth::id() == 1 || $user->adminAccount->role != 'supervisor')
                    <div class="row">
                        <form action="{{ route('dashboard.admin.destroy', $user->adminAccount->id) }}" method="POST"
                            class="col-4">
                            @csrf @method('DELETE')
                            <div class="form-group">
                                <input type="submit" value="Delete Role" class="btn btn-danger form-control btn-alert"
                                    data-message="Delete Admin Role?">
                            </div>
                        </form>
                        <form action="{{ route('dashboard.admin.update', $user->adminAccount->id) }}" method="Post"
                            class="col-4">
                            @csrf @method('PUT')
                            <div class="mr-2 form-group">
                                <select name="role" id="" class="form-control">
                                    <option value="moderator" @selected($user->adminAccount->role === 'moderator')>moderator</option>
                                    <option value="admin" @selected($user->adminAccount->role === 'admin')>admin</option>
                                    <option value="supervisor" @selected($user->adminAccount->role === 'supervisor')>supervisor</option>
                                </select>
                            </div>
                            <div class="mr-2 form-group">
                                <input type="submit" value="Change Role" class="btn btn-secondary form-control btn-alert"
                                    data-message="Change User Role?">
                            </div>
                        </form>
                    </div>
                @else
                    This User is A Supervisor
                @endif
            </div>
        @endadmin_with_role
    @else
        <div class="row">
            <form action="{{ route('dashboard.user.destroy', $user->id) }}" method="POST" class="col-4">
                @csrf @method('DELETE')
                <div class="form-groub">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger form-control btn-alert"
                        data-message="Delete user?">
                </div>
                @if ($user->trashed())
                    <div class="form-groub">
                        <input type="submit" name="restore" value="Restore"
                            class="btn btn-success form-control btn-alert" data-message="Restore user?">
                    </div>
                @else
                    <div class="form-groub">
                        <input type="submit" name="suspend" value="Suspend"
                            class="btn btn-secondary form-control btn-alert" data-message="Suspend user?">
                    </div>
                @endif
            </form>
            <form action="{{ route('dashboard.user.update', $user->id) }}" method="POST" class="col-4">
                @csrf @method('PUT')
                <div class="form-group">
                    <select name="role" id="" class="form-control">
                        <option value="moderator" selected>Moderator</option>
                        <option value="admin">Admin</option>
                        <option value="supervisor">Supervisor</option>
                    </select>
                    <div class="form-group">
                        <input type="submit" name="make_admin" value="Make Admin"
                            class="btn btn-info form-control btn-alert" data-message="Make Admin?">
                    </div>
                </div>
            </form>
        </div>
    @endif
</div>
