<td class="">
    @if ($user->trashed())
        <form action="{{ route('dashboard.user.destroy', $user->id) }}" method="POST">
            @csrf @method('DELETE')
            <div class="d-inline-block mr-1 form-group">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-alert form-control"
                    data-message="Delete User?">
            </div>
            <div class="d-inline-block mr-1 form-group">
                <input type="submit" name="restore" value="Restore" class="btn btn-success btn-alert form-control"
                    data-message="Restore User?">
            </div>
        </form>
    @else
        <div class="m-2 users-table-controls">
            @if ($user->register_via == 'web')
                <form action="{{ route('dashboard.user.update', $user->id) }}" method="POST" class="">
                    @csrf @method('PUT')
                    <div class="users-table-make-admin-form">
                        <div class="form-group">
                            <select name="role" class="form-control" id="">
                                <option value="moderator" selected>Moderator</option>
                                <option value="admin">Admin</option>
                                <option value="supervisor">Supervisor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="make_admin" value="Make Admin"
                                class="btn btn-secondary form-control btn-alert"
                                data-message="Make {{ $user->user_name }} Admin?">
                        </div>
                    </div>
                </form>
            @else
                <span class="users-table-social-registered">
                    Regiester via {{ $user->register_via }}
                </span>
            @endif
            <form action="{{ route('dashboard.user.destroy', $user->id) }}" method="POST" class="d-inline-block">
                @csrf @method('DELETE')
                <div class="d-inline-block form-group">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-alert form-control"
                        data-message="Delete User?">
                </div>
                <div class="d-inline-block form-group">
                    <input type="submit" name="suspend" value="Suspend" class="btn btn-dark btn-alert form-control"
                        data-message="Suspend User?">
                </div>
            </form>
        </div>
    @endif
</td>
