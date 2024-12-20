<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(idea $idea){
        $comment = new Comment;
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->user_name = auth()->user();
        $comment->content=request()->get('content');
        $comment->save();
        return redirect()->route('ideas.show',$idea->id)->with('success','comment posted successfully');

    }
}
