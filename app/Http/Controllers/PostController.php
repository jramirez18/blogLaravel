<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\UserFormRequest;
use Auth;

use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::paginate(10);
        //helper dd
        //dd($posts);
        return view('post.index',compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        //Validaciones por medio de la class Validator
        //$validator= Validator::make($request->all(),[
        //    'title'=>'required | min:5 |max:10',
        //    'content'=>'required | min:5 |max:50'
        //]);

        //aca retornamos una vista o un Error al Usuario
        //if ($validator->fails()) {
            # code...
          //  return redirect()->route('post.create')
            //    ->withErrors($validator)
              //  ->withInput();
        // }


        // Creamos una instancia del modelo Post
        $post= new Post();
        $post->title=$request->input('title',"");//obtenermos los valores del request del campo titulo
        $post->content=$request->input('content',"");
        //al crear el post se tome el id del que esta autenticado
        $post->user_id=$request->user()->id;

        $post->save();

        //return $post->id;
        return redirect()->route('post.show',['post'=>$post]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('post.show',compact("post"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('post.edit',compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, Post $post)
    {
        //Esto es de la POLITICA
        $this->authorize('update',$post);
        //TERMINA y nos tirara un error 403 this action is unauthorized.
        //obtenemos lo que venga del formulario
        $post->title=$request->input('title');
        $post->content=$request->input('content');

        $post->save();

        //hacemos un return a la misma URL
        return redirect()
                ->route('post.edit',['post'=>$post])
                ->with('message','Post Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Llamamos al GATE y luego al metodo denies
        //como parametro recibe el nomebre del gate
        //como sig parametro sera nuestro recurso el POST

        //LO QUE ESTO VA SER EVALUAR SI EL USUARIOS TIENE PERMISOS
        //SI EL USER NO TIENE PERMISOS ESTO ME VA DEVOLVER UN TRUE
        if (Gate::denies('delete-post',$post)) {
            # code...
            //Y ES AQI DONDE IMPLEMENTO UNA ACCION DONDE LE INDICO AL USUARIO QUE ESTA BORRANDO UN POST QUE NO ES DE EL
            return redirect()->back();//redirige al user al url anterior
        }


        //CON POLICE
        //obtenemos al user actual
        //if (Auth::user()->cant('delete',$post)) {
            # code...
            //evaluamos si el user puede eliminar el post
           // return redirect()->route('post.my')
           //     ->with('message','No tienes permisos para eliminar este post');
           // }
        //TERMINA
        $post->delete();
        return redirect()->route('post.index');
    }


    public function myPost()
    {
        //el Facade Auth devuelve al usuario actual
        $posts=Auth::user()->posts;
        //$post=Post::where('user_id');esta es otra forma

        return view('post.my',compact("posts"));
    }
}
