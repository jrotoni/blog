<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    function showArticles() {
        // $article1 = "Article 1 from Route";
        // $article2 = "Article 2 from Route";
        // $articles = ["Article 1", "Article 2", "Article 3"];
        $articles = Article::all(); //SELECT * FROM articles
        return view('articles/articles_list', compact('articles'));
    }

    function show($id) {
        // echo "ID is $id";
        // switch($id) {
        //     case 1:
        //     echo "NUMBER ONE";
        //     break;
        //     case 2:
        //     echo "NUMBER TWO";
        //     break;
        //     default: 
        //     echo "sample";
        // }
        $article = Article::find($id);
        // dd($article);
        return view('articles.single_article', compact('article'));
    }

    function createForm() {
        return view('articles.create_form');
    }
    
    function create(Request $request) {
        // dd($request);
        // echo "$request->title $request->content";
        $new_article = new Article;
        $new_article->title = $request->title;
        $new_article->content = $request->content;
        // dd($new_article);
        $new_article->save();

        return redirect('/articles');
    }

    function delete($id) {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles');

    }
}
