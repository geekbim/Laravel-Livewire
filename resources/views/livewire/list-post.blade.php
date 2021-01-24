<div>
    @foreach($posts as $post)
        <div class="p-4 my-2 bg-white shadow-xl">
            <span class="text-xl">{{ $post->user->name }}</span>
        </div>
    @endforeach
</div>
