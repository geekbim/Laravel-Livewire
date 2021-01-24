<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ListPost extends Component
{

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
}
