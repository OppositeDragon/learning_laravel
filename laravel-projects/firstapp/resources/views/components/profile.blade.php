<x-layout :sharedData="$sharedData" :title="$title">
	<div class="container py-md-5 container--narrow">
		<h2>
			<img class="avatar-small" src="{{ $sharedData['user']->avatar }}" />
			{{ $sharedData['user']->username }}
			@auth
				@if (!$sharedData['isFollowing'] and auth()->user()->id != $sharedData['user']->id)
					<form class="ml-2 d-inline" action="/follow/{{ $sharedData['user']->id }}" method="POST">
						@csrf
						<button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
					</form>
				@endif
				@if ($sharedData['isFollowing'])
					<form class="ml-2 d-inline" action="/follow/{{ $sharedData['user']->id }}" method="POST">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>

					</form>
				@endif
				@if (auth()->user()->username == $sharedData['user']->username)
					<a class="btn btn-secondary btn-sm" href="/manage-avatar">Manage avatar</a>
				@endif
			@endauth
		</h2>

		<div class="profile-nav nav nav-tabs pt-2 mb-4">
			<a class="profile-nav-link nav-item nav-link {{Request::segment(3)==""?"active":""}}" href="/profile/{{ $sharedData['user']->username }}">Posts:
				{{ $sharedData['posts']->count() }}</a>
			<a class="profile-nav-link nav-item nav-link  {{Request::segment(3)=="followers"?"active":""}}" href="/profile/{{ $sharedData['user']->username }}/followers">Followers: {{ $sharedData['followersCount'] }}</a>
			<a class="profile-nav-link nav-item nav-link  {{Request::segment(3)=="following"?"active":""}}" href="/profile/{{ $sharedData['user']->username }}/following">Following: {{ $sharedData['followingCount']}}</a>
		</div>
		<div class="profile-slot-content">
			{{ $slot }}
		</div>

	</div>
</x-layout>
