<x-layout>

	<div class="container py-md-5 container--narrow">
		<div class="d-flex justify-content-between">
			<h2>{{ $post->title }}</h2>
			@can('update', $post)
				<span class="pt-2">
					<a class="text-primary mr-2" data-toggle="tooltip" data-placement="top" href="/post/{{ $post->id }}/edit"
						title="Edit"><i class="fas fa-edit"></i></a>
					<form class="delete-post-form d-inline" action="#" method="POST">
						@csrf
						@method('DELETE')
						<button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i
								class="fas fa-trash"></i></button>
					</form>
				</span>
			@endcan
		</div>

		<p class="text-muted small mb-4">
			<a href="/profile/{{ $post->userFromPost->username }}"><img class="avatar-tiny"
					src="{{ $post->userFromPost->avatar }}" /></a>
			Posted by <a href="/profile/{{ $post->userFromPost->username }}">{{ $post->userFromPost->username }}</a> on
			{{ $post->created_at->format('F j, Y') }}
		</p>

		<div class="body-content">
			<p>{!! $post->body !!}</p>

		</div>
	</div>

</x-layout>
