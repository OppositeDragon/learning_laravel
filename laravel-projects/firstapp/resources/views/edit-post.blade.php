<x-layout title="Editing: {{ $post->title }}">
    <div class="container py-md-5 container--narrow">
		<p><strong><small><a href="/post/{{$post->id}}">&laquo; Back to post permalink</a></small></strong></p>
        <form action="/post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
                <input required value="{{ old('title', $post->title) }}" name="title" id="post-title"
                    class="form-control form-control-lg form-control-title" type="text" placeholder=""
                    autocomplete="off" />
                @error('title')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
                <textarea required name="body" id="post-body" class="body-content tall-textarea form-control" type="text">{{ old('body', $post->body) }} </textarea>
                @error('title')
                    <p class="m-0 small alert alert-danger shadow-sm">{{ message }}</p>
                @enderror
            </div>

            <button class="btn btn-primary">Save changes</button>
        </form>
    </div>
</x-layout>
