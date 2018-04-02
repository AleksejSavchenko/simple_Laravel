<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \App\Role;
use \App\User;
use \App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/articles', 'ArticlesController@index');

Route::get('/user_articles/{id}', 'ArticlesController@userArticles');

Route::get('/article/{id}', 'ArticlesController@showArticle')->name('showArticle');

Route::get('/articles/add', 'ArticlesController@addArticle');

Route::post('/articles/add', 'ArticlesController@saveArticle')->name('saveArticle');

Route::delete('articles/delete/{article}', 'ArticlesController@deleteArticle')->name('deleteArticle');
/*function(\App\Article $article){
    $article = \App\Article::where('id', $article)->first(); // Еще один вариант реализации метода удаления
    $article->delete();
    return redirect('/articles');*/

Route::get('/tasks', 'TasksController@index');

Route::post('/task', 'TasksController@addTask');

Route::delete('/task/{task}', 'TasksController@removeTask');

Route::get('/check_age', function () {
//    return view('welcome');
    return redirect()->action('ArticlesController@deleteArticle', ['id' => 17]);
})->middleware('checkAge');
//})->middleware(CheckAge::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/role_users', function (Request $request) {
    $role = Role::find(2);
    $role_users = $role->users;
    dd($role_users);
    return $role_users;
});


Route::get('/user_roles', function (Request $request) {
    $user_id = Auth::id();
    $user = User::find($user_id);
    $user_roles = $user->roles;
    dd($user_roles);
    return $user_roles;
});

Route::get('/model', function () {

//    $test_model->delete();
//    $test_model = \App\Test::updateOrCreate(
//        ['user_id' => '9', 'name' => 'Oakland12', 'email' => 'Diego13@gmail.com', 'phone' => '+38 050 03 950 15'],
//        ['user_id' => '6']
//    );
//    $test_model = \App\User::create(
//        ['name' => 'Alex', 'email' => 'Alex@gmail.com', 'password' => 'abrabra123']
//    );
//    $test_model = $test_model->where('id','>', '1')->get();
//    $test_model->delete();
//
//    $users_has_articles = User::has('articles')->get();
//    $users_has_articles = User::has('articles', '>=', 2)->get();

//    $article = Article::with('user')->get();
    $role = Role::find(2);
    $role = $role->users;
    dd($role);
    return $role;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@show')->name('profile');

Route::get('/add_role', ['middleware' => 'auth', function(){
    $role = new Role(['role' => 'guest', 'level_access' => 3]);
    $user = User::find(Auth::id());
    $user->roles()->save($role);
}]);

Auth::routes();

