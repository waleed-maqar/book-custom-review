<td class="">
    <div class="admins-table-controls">
        @if (Auth::id() == 1 || $admin->role != 'supervisor')
            <form action="{{ route('dashboard.admin.update', $admin->id) }}" method="Post" class="">
                @csrf @method('PUT')
                <div class="admins-table-change-role-form">
                    <div class="form-group">
                        <select name="role" class="form-control" id="">
                            <option value="moderator" @selected($admin->role === 'moderator')>moderator</option>
                            <option value="admin" @selected($admin->role === 'admin')>admin</option>
                            <option value="supervisor" @selected($admin->role === 'supervisor')>supervisor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Role" class="btn btn-secondary form-control btn-alert"
                            data-message="Change Admin's Role?">
                    </div>
                </div>
            </form>
            <form action="{{ route('dashboard.admin.destroy', $admin->id) }}" method="POST" class="">
                @csrf @method('DELETE')
                <div class="form-group">
                    <input type="submit" value="Delete" class="btn btn-danger form-control btn-alert"
                        data-message="Delete Admin?">
                </div>
            </form>
        @else
            <div class="">
                This User is A Supervisor
            </div>
        @endif
    </div>
</td>
