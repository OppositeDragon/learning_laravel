<x-layout>
	<div class="container py-md-5 container--narrow">
		<h2>
			<img class="avatar-small" src="{{auth()->user()->avatar}}" />
			{{ $user->username }}
			<form class="ml-2 d-inline" action="#" method="POST">
				<button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
				<!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
				@if (auth()->user()->username == $user->username)
					<a class="btn btn-secondary btn-sm" href="/manage-avatar">Manage avatar</a>
				@endif
			</form>
		</h2>

		<div class="profile-nav nav nav-tabs pt-2 mb-4">
			<a class="profile-nav-link nav-item nav-link active" href="#">Posts: {{ $posts->count() }}</a>
			<a class="profile-nav-link nav-item nav-link" href="#">Followers: 3</a>
			<a class="profile-nav-link nav-item nav-link" href="#">Following: 2</a>
		</div>

		<div class="list-group">
			@foreach ($posts as $post)
				<a class="list-group-item list-group-item-action" href="/post/{{ $post->id }}">
					<img class="avatar-tiny" src="{{ auth()->user()->avatar }}" />
					<strong>{{ $post->title }}</strong> on {{ $post->created_at->format('F j, Y') }}
				</a>
			@endforeach

		</div>
	</div>
</x-layout>
