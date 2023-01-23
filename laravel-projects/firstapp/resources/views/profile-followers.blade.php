<x-profile :sharedData="$sharedData">
	<div class="list-group">
		@foreach ($followers as $follower)
		followers
			<a class="list-group-item list-group-item-action" href="/profile/{{ $follower->userFollowing->username}}">
				<img class="avatar-tiny" src="{{$follower->userFollowing->avatar }}" />
			{{$follower->userFollowing->username}}
			</a>
		@endforeach
	</div>
</x-profile>
