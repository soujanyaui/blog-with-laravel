<?php
use App\Post;
//use App\Mail\mailme;
use Illuminate\Support\Facades\DB;

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
Auth::routes();

    Route::get('blog/{slug}','BlogController@getSingle')->name('blog.single')->where('slug','[\w\d\-\_]+');
    Route::get('blog','BlogController@getIndex')->name('blog.index');
    Route::get('/', function () {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome',Compact('posts'));
    });


    Route::get('about', 'HomeController@about');
    Route::get('contact-us', 'HomeController@contactUS');
//    Route::get('contact-us',function (){
//        Mail::to('javvaji.soujanya4@gmail.com')->send(new mailme);
//
//        return view('emails.mailme');
//
//    } );
    Route::post('contact-us','HomeController@contactUSPost')->name ('contactus.store');

    Route::resource('posts', 'PostController');
    Route::resource('tasks', 'TaskController');
//Route::get('/songs', 'SongsController')->name('songs');

