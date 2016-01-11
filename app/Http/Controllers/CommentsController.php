<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    public function newComment(CommentFormRequest $request)
    {
        $id=Auth::user()->id;
        $comment = new Comment(array(
            'user_id'=>$id,
            'post_id' => $request->get('post_id'),
            'content' => $request->get('content'),
            //'created_at' => $request->get('created_at'),
        ));

        $comment->save();
        /*
        $ticket = TrainingForum::whereid($id)->firstOrFail();
        // return view('training_forum.forum_show', compact('ticket'));
        //for comment
        $comments = $ticket->comments()->get();
        return view('training_forum.forum_show', compact('ticket', 'comments'));
*/
        return redirect()->back()->with('status', 'Your comment has been created!');
    }


}
