<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Article;
use App\User;
use App\Tag;
use App\Category;
use Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $tags = Tag::all();
        // dd($article);
        // dd($article->comments);
        // dd($article->comments()->get());
        // $comment = Comment::find($id);
        return view('articles.single_article', compact('article', 'tags'));
    }

    function createForm() {
        $categories = Category::all();
        return view('articles.create_form', compact('categories'));
    }
    
    function create(Request $request) {
        // dd($request);
        // echo "$request->title $request->content";
        $rules = array(
            'title' => 'required',
            'content' => 'required'
        );
        $this->validate($request, $rules);

        $new_article = new Article;
        $new_article->title = $request->title;
        $new_article->content = $request->content;
        $new_article->category_id = $request->category;
        // dd($new_article);
        $new_article->user_id = Auth::user()->id;
        $new_article->save();

        Session::flash('create_article_success','Article successfully created');

        return redirect('/articles');
    }

    function delete($id) {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles');

    }

    function edit(Request $request, $id) {
       $rules = array(
            'title' => 'required',
            'content' => 'required'
        );
        $this->validate($request, $rules);
        // echo "hello from edit";
        // dd($request);
        $article = Article::find($id);
        // dd($article);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect()->back();

    }

    function showProfile($id) {
        // echo "$id";
        
        $profile = User::find($id);
        return view('users.profile', compact('profile'));
    }
}
