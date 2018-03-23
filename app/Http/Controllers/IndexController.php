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
        $this->header = 'Hello World!';
        $this->message = "Some message.";
    }

    public function index() {
        $articles = Article::select(['id', 'title', 'desc', 'alias'])->get();
//        dump($articles);

        return view('page')->with([
            'header' => $this->header,
            'articles' => $articles
        ]);
    }

    public function showArticle($id){
        $article = Article::select('title', 'text')->where('id', $id)->first();
//        dump($article);

        return view('article-content')->with([
            'header' => $this->header,
            'article' => $article
        ]);
    }

}
