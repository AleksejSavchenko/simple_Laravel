    @extends('layouts.app')

        @section('content')
            <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">{{ $header }}</h1>
                    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                    <p><a class="btn btn-primary btn-lg" href="/articles/add" role="button">Добавить статью »</a></p>
                </div>
            </div>

            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Example row of columns -->
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-md-4">
                        <h2>{{ $article->title }}</h2>
                        <p>{{ $article->desc }}</p>
                        <p>
                            <a class="btn btn-secondary" href="{{ route( 'showArticle', ['id' => $article->id] ) }}" role="button">Подробнее »</a>
                            <form action="{{ route('deleteArticle', ['id' => $article->id]) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{csrf_field()}}
                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </p>
                    </div>
                    @endforeach
                </div>
                    @if(method_exists($articles, 'links'))
                        <div class="row">
                            <div class="pagination col-12 mb-3 mt-3">{{ $articles->links() }}</div>
                        </div>
                    @endif
                <hr>

            </div> <!-- /container -->

        </main>
        @endsection
