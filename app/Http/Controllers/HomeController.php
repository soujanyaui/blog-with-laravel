<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\ContactUS;
use Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.welcome');
    }

    public function about()
    {
        return view('pages.about');
    }
    public function contactUS()
    {
        return view('pages.contactUS');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUSPost(StoreBlogPost $request)
    {

        ContactUS::create($request->all());

//        Mail::send('mail',
//            array(
//                'name' => $request->get('name'),
//                'email' => $request->get('email'),
//                'user_message' => $request->get('message')
//            ), function($message)
//            {
//                $message->from('spabbathi@tradenavigator.com');
//                $message->to('javvaji.soujanya4@gmail.com', 'AdminRoles')->subject('welcome to email');
//            });



        return back()->with('success', 'Thanks for contacting us!');
    }

}
