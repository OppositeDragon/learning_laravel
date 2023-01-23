<x-layout>
	<div class="container py-md-5 container--narrow">
		@unless($posts->isEmpty())
			<h2 class="text-center mb-4">The posts from the ones you follow!</h2>
			<div class="list-group">
				@foreach ($posts as $post)
					<a class="list-group-item list-group-item-action" href="/post/{{ $post->id }}">
						<img class="avatar-tiny" src="{{ $post->userFromPost->avatar }}" />
						<strong>{{ $post->title }}</strong>
						<span class="text-muted small">
							by <strong>
								{{ $post->userFromPost->username }}
							</strong>
							on <em>{{ $post->created_at->format('F j, Y') }}</em>
						</span>
					</a>
				@endforeach
			</div>
		@else
			<div class="text-center">
				<h2>Hello <strong>{{ auth()->user()->username }}</strong>, your feed is empty.</h2>
				<p class="lead text-muted">Your feed displays the latest posts from the people you follow. If you don&rsquo;t
					have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo; feature in the top
					menu bar to find content written by people with similar interests and then follow them.</p>
			</div>
			@endif

		</div>
	</x-layout>
