<table class="dashboard-control-table">
    <div class="mb-3 dasboard-control-table-pagination">
        {{ $users->render('pagination.ajax.ajaxPaginator') }}
    </div>
    <tr>
        <th>Name</th>
        <th>Books Count</th>
        <th>Reviwes Count</th>
        <th>Reports Count</th>
        <th>Action</th>
    </tr>
    @forelse ($users as $user)
        <tr>
            <td><a href="{{ route('dashboard.user.show', $user->id) }}">{{ excerpt($user->user_name, 12, true) }}</a>
            </td>
            <td>{{ count($user->books) }}</td>
            <td>{{ count($user->reviews) }}</td>
            <td>{{ count($user->reportedBooks) + count($user->reportedReviews) }}</td>
            @include('Admin.parts.users.userstableform')
        </tr>
    @empty
    @endforelse
</table>
