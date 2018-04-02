<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use Cookie;

class ArticlesController extends Controller
{
    protected $header;
    protected $message;

    public function __construct()
    {
        $this->header = 'Articles';
        $this->message = "Some message.";
    }

    public function index() {
        $articles = Article::select(['id', 'title', 'desc', 'user_id'])->orderBy('title', 'asc')->paginate(6);

        return view('articles')->with([
            'header' => $this->header,
            'articles' => $articles
        ]);
    }

    public function showArticle($id){
        $article = Article::select('title', 'text', 'user_id')->where('id', $id)->first();

        return view('article-content')->with([
            'header' => $this->header,
            'article' => $article
        ]);
    }

    public function addArticle() {
        return view('article-add')->with([
            'header' => $this->header,
        ]);
    }

    public function saveArticle(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255|min:3',
            'desc' => 'required|max:255|min:3',
            'text' => 'required|max:1000'
        ]);
        $data = $request->all();
//        dd($request->route());
//        Cookie::queue('name2', 'value');

        $new_article = new Article();
        $new_article['user_id'] = Auth::id();
        $new_article->fill($data);
        $new_article->save();
//        return $request;
        return redirect('/articles')->with(['status' => 'Статья добавлена!']);
    }

    public function deleteArticle(Article $article){
        $article->delete();
        return redirect('/articles');
    }

    public function userArticles(Request $request){
        $articles = User::find($request->id)->articles;
        return view('articles')->with([
            'header' => $this->header,
            'articles' => $articles
        ]);
    }

}
