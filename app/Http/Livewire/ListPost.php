<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;

class ListPost extends Component
{

    public $updateStateId = 0;
    public $body = 0;

    protected $listeners = [
        'postCreated' => '$refresh',
    ];

    public function render()
    {
        $posts = Post::latest()->get();

        return view('livewire.list-post', [
            'posts' => $posts,
        ]);
    }

    public function showUpdateForm($postId)
    {
        $post = Post::find($postId);
        $this->body = $post->body;
        $this->updateStateId = $postId;
    }

    public function updatePost($postId)
    {
        $post = Post::find($postId);
        $this->body = $post->body;
        $post->created_at = Carbon::now();
        $post->save();

        $this->updateStateId = 0; //biar ketutup lagi textareanya
    }
}
