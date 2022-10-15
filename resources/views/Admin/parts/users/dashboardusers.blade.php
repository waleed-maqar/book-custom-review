{{ $users->render('pagination.ajax.ajaxPaginator') }}
<div class="dashboard-users-card" id="dashboarduserscard">
    @forelse ($users as $user)
        <a href="{{ route('dashboard.user.show', $user->id) }}" class="dashboard-single-user">
            {{ $user->user_name }}
        </a>
    @empty
    @endforelse
</div>
