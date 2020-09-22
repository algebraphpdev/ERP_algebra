<ul class="list-group">
    @forelse ($users as $user)
        <li class="list-group-item">
            <span class="badge">{{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}</span>
            {{ $user->first_name .  ' ' . $user->last_name . ' s ' . $user->email }}
        </li>
    @empty
        <li class="list-group-item"></li>
    @endforelse
</ul>
