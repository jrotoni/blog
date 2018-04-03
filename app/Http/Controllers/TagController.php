<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TagController extends Controller
{
    function addTag(Request $request, $article_id){
        $article = Article::find($article_id);
        // dd($request->tag);
        $article->tags()->attach($request->tag);

        return redirect()->back();
    }
}
