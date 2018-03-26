<!-- resources/views/tasks.blade.php -->

@extends('layouts.site')

@section('content')

    <!-- Bootstrap шаблон... -->
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Tasks</h1>
            </div>
        </div>
        <div class="container">

            <div class="panel-body">
                <!-- Отображение ошибок проверки ввода -->
            @include('common.errors')

            <!-- Форма новой задачи -->
                <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Имя задачи -->
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Задача</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                    </div>

                    <!-- Кнопка добавления задачи -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Добавить задачу
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Текущие задачи -->
            @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущая задача
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                {{--<form action="{{ url('task/delete/' . $task->id) }}" method="post">--}}
                                <form action="{{ url('task/' . $task->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Заголовок таблицы -->
                <thead>
                <th>Task</th>
                <th>&nbsp;</th>
                </thead>

                <!-- Тело таблицы -->
                <tbody>
                    <tr>
                        <td class="w-100">No tasks</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
        </div>
    </main>
@endsection