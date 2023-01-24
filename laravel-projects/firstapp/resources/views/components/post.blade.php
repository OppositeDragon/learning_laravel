<a class="list-group-item list-group-item-action" href="/post/{{ $post->id }}">
	<img class="avatar-tiny" src="{{ $post->userFromPost->avatar }}" />
	<strong>{{ $post->title }}</strong>
	<span class="text-muted small">
		@unless(@isset($hideAuthor))
			by <strong> {{ $post->userFromPost->username }} </strong>
		@endunless
		on <em>{{ $post->created_at->format('F j, Y') }}</em>
	</span>
</a>
