<table class="dashboard-control-table">
    <div class="mb-3 dasboard-control-table-pagination">
        {{ $admins->render('pagination.ajax.ajaxPaginator') }}
    </div>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>role</th>
        @admin_with_role('supervisor')
            <th>Actions</th>
        @endadmin_with_role
    </tr>
    @forelse ($admins as $admin)
        <tr>
            <td><a
                    href="{{ route('dashboard.user.show', $admin->user_id) }}">{{ excerpt($admin->name, 12, true) }}</a>
            </td>
            <td>{{ excerpt($admin->email, 12, true) }}</td>
            <td>{{ $admin->role }}</td>
            @admin_with_role('supervisor')
                @include('Admin.parts.admins.adminstableform')
            @endadmin_with_role
        </tr>
    @empty
    @endforelse
</table>
