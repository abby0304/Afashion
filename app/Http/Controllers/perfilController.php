<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\article;
use App\comment;
use App\follow;
use DB;

class perfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$hola="hello";
      //dd($hola);
        //return view('busqueda', array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //
          if($request->ajax()){

            $follow_find = follow::where([
                'user_id' => $request['user'],
                'user_follow' => $request['user_follow']
                ])->first();

            //si se encontro eliminar 
            if($follow_find)
            {
                //si no se encontro agregar un like nuevo
                return response()->json([
                    DB::table('follows')->where([
                        'user_id' => $request['user'],
                        'user_follow' => $request['user_follow']
                        ])->delete()
                ]);
            }
            else
            {
                //si no se encontro agregar un like nuevo
                return response()->json([
                    follow::create([
                        'user_id' => $request['user'],
                        'user_follow' => $request['user_follow']
                    ])
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
       $articles = DB::table('articles')
       ->where(['user_id' => $id, 'borrador' => 1])
       ->get();

       $users = DB::table('users')
       ->where(['id' => $id])
       ->get();

       $follow = DB::table('follows')
       ->where(['user_id' => Auth::user()->id, 'user_follow' => $id])
       ->get();

       $follows = DB::table('follows')
       ->select('users.id', 'users.name', 'users.apellido', 'users.imagen_avatar')
       ->join('users', 'follows.user_follow', '=', 'users.id')
       ->where(['user_id' => $id])
       ->get();

       //dd($follows);
      
       return view('perfil', array('user' => Auth::user(),'articles' =>  $articles, 'user_art' => $users, 'id' => $id, 'follow' => $follow, 'follows' =>$follows));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
