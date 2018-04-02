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

            @if(count($errors) > 0)
                <div class="container">
                    <div class="row">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <h2 class="col-12">Добавление новой статьи</h2>
                    <form method="POST" action="{{ route('saveArticle') }}" class="form w-75">
                        <div class="form-group">
                            <label>Название:</label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        <div class="form-group">
                            <label>Описание:</label>
                            <input class="form-control" type="text" name="desc">
                        </div>
                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control" type="text" name="text" rows="3"></textarea>
                        </div>

                        <button class="btn btn-dark" type="submit">Отправить</button>

                        {{ csrf_field() }}
                    </form>
                </div>

                <hr>

            </div> <!-- /container -->

        </main>
        @endsection
