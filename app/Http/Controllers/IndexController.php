<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class IndexController extends Controller
{
    protected $header;
    protected $message;

    public function __construct()
    {
        $this->header = 'Articles';
        $this->message = "Some message.";
    }

    public function index() {
        $articles = Article::select(['id', 'title', 'desc', 'alias'])->orderBy('title', 'asc')->get();

        return view('articles')->with([
            'header' => $this->header,
            'articles' => $articles
        ]);
    }

    public function showArticle($id){
        $article = Article::select('title', 'text')->where('id', $id)->first();

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
            'alias' => 'required|max:255|min:3',
            'text' => 'required|max:1000'
        ]);
        $data = $request->all();
        $new_article = new Article();
        $new_article->fill($data);
        $new_article->save();
        return redirect('/articles');
    }

    public function deleteArticle(Article $article){
        $article->delete();
        return redirect('/articles');
    }

}
