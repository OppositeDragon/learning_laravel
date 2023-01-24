<x-layout title="Create new post">
	<div class="container py-md-5 container--narrow">
		<form action="/create-post" method="POST">
			@csrf
			<div class="form-group">
				<label class="text-muted mb-1" for="post-title"><small>Title</small></label>
				<input class="form-control form-control-lg form-control-title" id="post-title" name="title" type="text"
					value="{{ old('title') }}" required placeholder="" autocomplete="off" />
				@error('title')
					<p class="m-0 small alert alert-danger shadow-sm">{{ message }}</p>
				@enderror
			</div>

			<div class="form-group">
				<label class="text-muted mb-1" for="post-body"><small>Body Content</small></label>
				<textarea class="body-content tall-textarea form-control" id="post-body" name="body" type="text" required>{{ old('body') }} </textarea>
				@error('title')
					<p class="m-0 small alert alert-danger shadow-sm">{{ message }}</p>
				@enderror
			</div>

			<button class="btn btn-primary">Save New Post</button>
		</form>
	</div>
</x-layout>
