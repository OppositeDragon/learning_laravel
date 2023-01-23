<x-profile :sharedData="$sharedData">
	<div class="list-group">
		@foreach ($posts as $post)
		followers
			<a class="list-group-item list-group-item-action" href="/post/{{ $post->id }}">
				<img class="avatar-tiny" src="{{ $sharedData['user']->avatar }}" />
				<strong>{{ $post->title }}</strong> on {{ $post->created_at->format('F j, Y') }}
			</a>
		@endforeach
	</div>
</x-profile>
