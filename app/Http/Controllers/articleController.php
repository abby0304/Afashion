<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;
use Auth;
use App\article;
use App\comment;
use DB;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activo="true";
        return view('agregar-contenido', array('user' => Auth::user(),'activo' =>  $activo));
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
        $this->validate(request(),[
            'name_article' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            ]);         

            $article= new article();
            $article->name_article = $request['name_article'];
            $article->description= $request['description'];
            $article->user_id = Auth::user()->id;
            $article->borrador= $request['borrador'];
 
            //Imagen
            foreach (array(1, 2, 3, 4, 5) as $valor) {
                if($valor <= $request['number_i'])
                {
                    //ciclo de las imagenes
                    $img= 'img'.$valor;
                    
                    //mandar a la nube
                    $file = $request->file($img);
                    $imageavatar = time().$file->getClientOriginalName();
                    $filename_avatar = pathinfo($imageavatar, PATHINFO_FILENAME);
                    $imagen_ruta = $file->getRealPath();
                    Cloudder::upload($imagen_ruta,  "Publi_multi/".$filename_avatar);

                    //mandar a nombre a la base de datos
                    $article->$img = $filename_avatar;
                }
                else{
                $img= 'img'.$valor;
                $article->$img = 'null';
                }
            }

             //Video
             foreach (array(1, 2, 3) as $valor) {
                if($valor <= $request['number_v'])
                {
                    //ciclo de las imagenes
                    $video= 'video'.$valor;
                    $file = $request->file($video);
                    $video_article = time().$file->getClientOriginalName();
                    $filename_video = pathinfo($video_article, PATHINFO_FILENAME);
                    $video_ruta = $file->getRealPath();
                    Cloudder::uploadVideo($video_ruta,  "Publi_multi/".$filename_video);
                    
                    //mandar a nombre a la base de datos
                    $article->$video = $video_article;
                }
                else{
                $video= 'video'.$valor;
                $article->$video = 'null';
                }
            }

        $article->activo = 1;
        // add other fields
        $article->save();

        return redirect('/home');
        //return $request->all();
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
       $article = article::find($id);
       $article->each(function($article){
        $article->users;
       });

       $comment = DB::table('comments')
       ->select('comments.id', 'users.id as userid','comments.comment_des','comments.user_id','comments.article_id', 'comments.created_at', 'users.name', 'users.imagen_avatar')
       ->join('users', 'users.id', '=', 'comments.user_id')
       ->where('article_id', '=', $id)
       ->orderBy('comments.id', 'desc')
       ->get();

       $heart = DB::table('hearts')
       ->select(DB::raw('count(valoracion) as likes'))
       ->where('article_id', '=', $id)
       ->get();

       $heart_user = DB::table('hearts')
       ->where(['article_id' => $id, 'user_id' => Auth::user()->id ])
       ->get();

       //dd($comment);

       //dd($article);
             
       return view('show', array('user' => Auth::user(),'article' =>  $article, 'comments' =>  $comment, 'heart' =>$heart, 'heart_user' => $heart_user));
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
        $article = article::find($id);
        $article->name_article = $request['name_article'];
        $article->description= $request['description'];
        $article->borrador= $request['borrador'];

        //Imagen
        foreach (array(1, 2, 3, 4, 5) as $valor) {
            if($request['img'.$valor])
            {
                //ciclo de las imagenes
                $img= 'img'.$valor;
                
                //mandar a la nube
                $file = $request->file($img);
                $imageavatar = time().$file->getClientOriginalName();
                $filename_avatar = pathinfo($imageavatar, PATHINFO_FILENAME);
                $imagen_ruta = $file->getRealPath();
                Cloudder::upload($imagen_ruta,  "Publi_multi/".$filename_avatar);

                //mandar a nombre a la base de datos
                $article->$img = $filename_avatar;
            }
        }

         //Video
         foreach (array(1, 2, 3) as $valor) {
            if($request['video'.$valor])
            {
                //ciclo de las imagenes
                $video= 'video'.$valor;
                $file = $request->file($video);
                $video_article = time().$file->getClientOriginalName();
                $filename_video = pathinfo($video_article, PATHINFO_FILENAME);
                $video_ruta = $file->getRealPath();
                Cloudder::uploadVideo($video_ruta,  "Publi_multi/".$filename_video);
                
                //mandar a nombre a la base de datos
                $article->$video = $video_article;
            }
        }



        $article->save();

        //dd($article);

        return redirect('/usuario');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([ article::find($id)->delete() ]);
        //return redirect('/usuario');
    }
}
