    @extends('layouts.app')

        @section('content')
            <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">{{ $header }}</h1>
                </div>
            </div>

            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    @if($user_profile)
                        <div class="col-md-12">
                            <label class="font-weight-bold">Login:</label>
                            <h2>{{ $user_profile->name }}</h2>
                            <br>
                            <label class="font-weight-bold">Email:</label>
                            <p>{{ $user_profile->email }}</p>

                            @if(count($user_profile['role']) > 0)
                            <label class="font-weight-bold">Роли:</label>
                            <ol>
                            @foreach($user_profile->role as $role)
                                <li>
                                    <p>{{ $role->role }} (Уровень доступа: {{ $role->level_access }})</p>
                                </li>
                            @endforeach
                            </ol>
                            @else
                                <label class="font-weight-bold">Роли:</label>
                                <p>Не заданы.</p>
                            @endif
                            <label class="font-weight-bold">Id Пользователя:</label>
                            <p>{{ $user_profile->id }}</p>
                            <label class="font-weight-bold">Дата регистрации:</label>
                            <p>{{ $user_profile->created_at }}</p>
                        </div>
                    @endif
                </div>

                <hr>

            </div> <!-- /container -->

        </main>
        @endsection
