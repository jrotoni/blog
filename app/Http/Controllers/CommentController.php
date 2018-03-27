<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function add_comment(Request $request, $id) {
        // dd($request);
        $rules = array(
            'comment' => 'required'
        );
        $this->validate($request, $rules);

        $new_comment = new Comment;
        $new_comment->comment = $request->comment;
        $new_comment->user_id = Auth::user()->id;
        $new_comment->article_id = $id;
        // dd($new_comment);
        $new_comment->save();

        Session::flash('create_comment_success','Comment successfully added');

        // return redirect('/articles/$id');
        return redirect()->back();
    }
}
