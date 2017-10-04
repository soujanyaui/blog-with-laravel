<?php

use App\Post;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreBlogPost;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use App\Events\TaskEvent;

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

Route::get('blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');
Route::get('blog', 'BlogController@getIndex')->name('blog.index');
Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
    return view('pages.welcome', Compact('posts'));
});
Route::get('/users/logout','Auth\AdminLoginController@userLogout')->name('user.logout');


Route::get('about', 'HomeController@about');
Route::get('sendEmail', function () {
    $job = (new SendEmailJob())
        ->delay(Carbon::now()->addSeconds(5));
    dispatch($job);
//        dispatch(new SendEmailJob());

    return view('emails.mailme');

});
Route::get('contact-us', 'HomeController@contactUS');
Route::get('event', function () {
    event(new TaskEvent('Hello how are you'));
});
Route::get('listen', function () {
    return view('emails.listenBroadcast');
});
//    Route::get('contact-us',function (){
//        Mail::to('javvaji.soujanya4@gmail.com')->send(new mailme);
//
//        return view('emails.mailme');
//
//    } );
    Route::post('contact-us', 'HomeController@contactUSPost')->name('contactus.store');

//    Route::get('password/reset/{token}', 'Auth\ResetPassswordController@showResetForm');
//    Route::post('password/email', 'Auth\ResetPassswordController@sendResetLinkEmail');
//    Route::post('password/reset', 'Auth\ResetPassswordController@reset');
    Route::resource('posts', 'PostController');
    Route::resource('tasks', 'TaskController');
    Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //password reset routes
     Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');//step2
     Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm ')->name('admin.password.request');//step1
     Route::post('/password/reset','Auth\AdminResetPasswordController@reset');//step4
     Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');//step3

});




