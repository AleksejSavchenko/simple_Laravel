    @extends('layouts.app')

        @section('content')
            <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">{{ $header }}</h1>
                    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                    <p><a class="btn btn-primary btn-lg" href="/articles" role="button">Каталог статей »</a></p>
                </div>
            </div>

            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    @if($article)
                        <div class="col-md-12">
                            <h2>{{ $article->title }}</h2>
                            <br>
                            <label class="font-weight-bold">Текст:</label>
                            <p>{{ $article->text }}</p>
                            <label class="font-weight-bold">Id Пользователя:</label>
                            <p>{{ $article->user_id }}</p>
                        </div>
                    @endif
                </div>

                <hr>

            </div> <!-- /container -->

        </main>
        @endsection
