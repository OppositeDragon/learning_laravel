<x-profile :sharedData="$sharedData" title="{{ $sharedData['user']->username }}'s Profile" >
	<div class="list-group">
		@foreach ($posts as $post)
		<x-post :post="$post" hideAuthor/>
		@endforeach
	</div>
</x-profile>
