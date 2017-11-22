<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Auth;

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
        $user = Auth::user();
        return view('user.personal',['user'=>$user]);
    }

    public function settings(){
        return view('user.manage');
    }

    public function manageArticles(){
        //Get all articles of the current user
        $user = Auth::user();
        $articles = Article::where("user_id", '=',$user->id)->get();

        return view('user.articles',['articles'=> $articles]);
    }

    public function sellArticle(){
        return view('user.new');
    }
}
