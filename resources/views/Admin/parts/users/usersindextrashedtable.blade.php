<table class="dashboard-control-table"">
    <div class="mb-3 dasboard-control-table-pagination">
        {{ $trashedUsers->render('pagination.ajax.ajaxPaginator') }}
    </div>
    <tr>
        <th>Name</th>
        <th>Books Count</th>
        <th>Reviwes Count</th>
        <th>Reports Count</th>
        <th>Action</th>
    </tr>
    @forelse ($trashedUsers as $user)
        <tr>
            <td><a href="{{ route('dashboard.user.show', $user->id) }}">{{ $user->user_name }}</a></td>
            <td>{{ count($user->books) }}</td>
            <td>{{ count($user->reviews) }}</td>
            <td>{{ count($user->reportedBooks) + count($user->reportedReviews) }}</td>
            @include('Admin.parts.users.userstableform')
        </tr>
    @empty
    @endforelse
</table>
