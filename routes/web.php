<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
{
    Route::get('/', function () {
        return view('welcome');
    });
}
//    Route::get('/createPost', 'PostsController@createPost');
//    Route::get('/updatePost', 'PostsController@updatePost');
//    Route::get('/showAllPost', 'PostsController@showAllPost');
//    Route::get('/softDelete', 'PostsController@softDelete');
//    Route::get('/showTrashedPost', 'PostsController@showTrashedPost');
//    Route::get('/restorePost', 'PostsController@restorePost');
//    Route::get('/forceDelete', 'PostsController@forceDelete');

//Eloquent Relationship
//Route::get('/user/{id}/post', function ($id){
//    $userPost = \App\User::find($id)->post;
//    return $userPost;
//});
//one to one Relationship
//Route::get('/post/{id}/{user}', function ($id) {
//    $postUser = \App\Post::find($id)->user;
//    return $postUser;
//});

//one to many Relationship
//Route::get('/user/{id}/posts', function($id){
//    $user_posts = \App\User::findOrFail($id)->posts;
//    foreach ($user_posts as $post){
//        echo $post->title;
//        echo '</br>';
//    }
//});

//many to many relationship
//Route::get('/user/{id}/roles', function($id){
//    $user = \App\User::find($id);
//    foreach($user->roles as $role)
//    {
//        echo $role->name;
//        echo "</br>";
//    }
//});
 //Has many through relationship
//
//Route::get('/post/{id}/country', function($id){
//    $country = \App\Country::find($id);
//    foreach($country->posts as $post)
//    {
//        echo $post->title;
//        echo "</br>";
//    }
//});
//one to many polymorphic relationship
//Route::get('user/{id}/photo', function($id){
//    $userPhoto = \App\User::find($id);
//    foreach ($userPhoto->photos as $photo)
//    {
//        echo $photo->path;
//        echo "</br>";
//    }
//});

//many to many polymorphic relationship
//Route::get('/post/tags', function(){
//    $post =\App\Post::find(2);
//    foreach ($post->tags as $postTag)
//    {
//        echo $postTag->name;
//
//    }
//});
//
//Crud one to many Relationship
//Route::get('/create', function(){
//    $user = \App\User::find(3);
//    $post = new \App\Post();
//    $post->title = 'Hello ';
//    $post->content = 'Hello to World';
//    $user->posts()->save($post);
//});
//Route::get('/read', function(){
//    $user = \App\User::find(2);
//    foreach($user->posts as $post)
//    {
//        echo  $post->title;
//        echo "</br>";
//    }
//});
//
//Route::get('/update', function(){
//    $user= \App\User::find(3);
//    $user->posts()->whereId(17)->update(['title'=>'Update Post', 'content'=>'This is how we can use the magic facilities of laravel to update the DB table in one line']);
//});
//Route::get('/delete', function(){
//    $user = \App\User::find(1);
//    foreach ($user->posts as $post)
//    {
//        if($post->title == 'Ceate new post with tinker')
//        {
//            $post->delete();
//        }
//    }
//});
//Route::get('/role', function(){
//    $user = \App\User::find(1);
//    $role = new \App\Role();
//    $role->name = 'writer';
//    $user->roles()->save($role);
//});
//Route::get('/roleAdmin', function(){
//   $user = \App\User::find(2);
//   $role = new \App\Role();
//   $role->name = 'admin';
//   $user->roles()->save($role);
//});
//Route::get('/findRole', function(){
//    $user = \App\User::find(2);
//    foreach($user->roles as $role )
//    {
//        echo $role->name;
//        echo "</br>";
//    }
//});
//Route::get('/updateRole', function(){
//    $user = \App\User::find(1);
//    if ($user->has('roles'))
//    {
//        foreach($user->roles as $role)
//        {
//            if($role->name == 'admin')
//            {
//                $role->name = 'مدیر';
//                $role->save();
//            }
//        }
//    }
//});
//Route::get('detach', function(){
//    $user = \App\User::find(1);
//    $user->roles()->detach();
//});
//Route::get('attach', function(){
//    $user = \App\User::find(1);
//    $user->roles()->attach(3);
//});
//
//Route::get('sync', function(){
//    $user = \App\User::find(1);
//    $user->roles()->sync([1,2,3]);
//});
//CRUD Operation In polymorphic many to many Relationship:

//Forms Routes

//Route::resource('/posts', 'PostsController');
//}

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');





//Route::get('/see', function(){
//    $user = Auth::user();
//   if (Auth::check())
//   {
//       echo "hello". $user->name;
//   }else{
//       return redirect()->to('home');
//   }
//    $main_user = \App\User::findOrFail(7);
//    $user = Auth::login($main_user);
//    dd($user);
//});
//Route::get('/test/{id}/{newRole}', function($role, $newRole){
//$user = \App\User::find($role);
//$user_role = $user->isAdmin($newRole);
//dd($user_role);
//});
Route::get('/admin', function(){
    echo "Welcome to admin Page";
})->middleware('isAdmin:writer');

Auth::routes(['verify'=>true]);
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/posts', 'PostsController');
});

Route::get('session', function(Request $request){
    $request->session()->forget('username');
 return  $request->session()->all();
});

//changes has been done

Route::prefix('fa')->group(function(){
    App::setLocale('fa');
    Route::get('/message', function(){
        return view ('message');
    });
});
