<?php

namespace App\Http\Livewire;

use App\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    // public $comments;

    public $newComment;

    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function render()
    {
        // $comments = Comment::latest()->paginate(2);
        // $this->comments = $comments;

        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(2)
        ]);
    }

    // public function mount()
    // {
    //     $comments = Comment::latest()->get();
    //     $this->comments = $comments;
    // }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|max:255'
        ]);

        $createdComment = Comment::insert([
            'user_id' => 1,
            'body' => $this->newComment,
            'created_at' => Carbon::now(),
        ]);

        // $this->comments->push($createdComment);

        $this->newComment = '';

        session()->flash('message', 'Comment added successfully! xD');
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:255']);
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);

        $comment->delete();

        session()->flash('message', 'Comment deleted successfully! xD');

        // $this->comments = $this->comments->except($commentId);
    }
}
