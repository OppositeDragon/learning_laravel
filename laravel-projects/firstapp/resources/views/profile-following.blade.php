<x-profile :sharedData="$sharedData" title="{{ $sharedData['user']->username }} follows">
	<div class="list-group">
		@foreach ($following as $follow)
		following
			<a class="list-group-item list-group-item-action" href="/profile/{{ $follow->userFollowed->username }}">
				<img class="avatar-tiny" src="{{ $follow->userFollowed->avatar }}" />
				{{$follow->userFollowed->username}}
			</a>
		@endforeach
	</div>
</x-profile>
