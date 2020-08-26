<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\article;
use App\follow;
use App\User;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$articles = article::orderBy('id', 'DESC')->paginate(1);

        $user = Auth::user()->id;

        //Seguirme a mi mismo 
        $follow_find = follow::where([
            'user_id' => $user,
            'user_follow' => $user
            ])->first();

        if( $follow_find == null)
        {
            follow::create([
                'user_id' => $user,
                'user_follow' => $user
             ]);
        }

        //dd($follow_find);

        //Obtener los articulos de los usuarios que sigo
        $articles = DB::table('articles')
        ->select('articles.id', 'articles.user_id','users.name','articles.img1','articles.name_article', 'articles.description','articles.created_at')
        ->join('users', 'articles.user_id', '=', 'users.id')
        ->join('follows', function($join) use ($user) {
                $join->on('follows.user_follow', '=', 'articles.user_id')
                     ->where('follows.user_id','=', $user);
        })
        ->where('articles.borrador', '=', 1)
        ->orderBy('articles.id', 'desc')
        //->get()
        ->paginate(4);

        //dd($articles);
     
        return view('home', array('user' => Auth::user(),'articles' => $articles));
    }
}
