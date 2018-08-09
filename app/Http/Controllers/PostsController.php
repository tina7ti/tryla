<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\EditPostRequest;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Validator;


class PostsController extends Controller
{
    public function index()
    {
      /* $posts = Post::where('online',true)->get();
      a la place de cette requete lorsqu'on a defini la fonction scopePublished on l'utilise directement
      comme suit
      */
      //$posts = Post::published()->get();
       // $posts = Post::published()->searchByTitle('post')->get();
        /*$posts = Post::get();
        $posts->load('category') */;
      // ces 2 lignes sont egaux a celle la
         $posts = Post::with('category')->get();
        /*si on veut ajouter plus de spécification a notre requete
        $posts = Post::with(['category' => function($query)
        {
            $query->select('name');
        }])->get(); */
        return view('posts.index',compact('posts'));
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id');
        $options = ['method'=> 'PUT', 'url' => route('news.update',$post)];
        $bouton = "Editer";
        return view('posts.edit',compact('post','categories','options','bouton'));
    }
    public function update($id, EditPostRequest $request)
    {
        /*  $post = Post::findOrFail($id);
          $validator = Validator::make($request->all(),
              [
                'title' => 'required|min:5',
                'content' => 'required|min:10'
              ]);

              if ($validator->fails())
              {
                  return redirect(route('news.edit',$id))->withErrors($validator->errors());
              } else
              {
                  $post->update($request->all());
              $post->tags()->sync($request->get('tags'));
              return redirect(route('news.edit',$id));
              }*/
        // tous ça peut etre remplacé par :
       // $this->validate($request,  Post::$rules);
        // mais au lieu de faire tous ça on peut créer un objet request et copie nos rules le dans
        // et au lieu de passer Request en parametres on passe notre propre request
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $post->tags()->sync($request->get('tags'));
        return redirect(route('news.edit',$id));
    }
    public function create()
    {
        $post = new Post();
        $categories = Category::pluck('name','id');
        $options = ['method'=> 'posts', 'url' => route('news.store')];
        $bouton = "Ajouter";
        return view('posts.create',compact('post','categories','options','bouton'));
    }
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return redirect(route('news.edit',$post));
    }
}
