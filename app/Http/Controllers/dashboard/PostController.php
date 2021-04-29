<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
        // $this->middleware('rol.moderator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin') OR Gate::allows('isModerator')){
            if (Gate::allows('isAdmin')) {
                $posts = Post::orderBy('created_at','desc')->paginate(10);
                return view("dashboard.post.index", ['posts' => $posts]);
            }else{
                $posts = Post::orderBy('created_at','desc')->paginate(10);
                return view("dashboard.post.index", ['posts' => $posts]);
            }
            
        }else{
            dd('You are not admin or moderator');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id','title');

        return view("dashboard.post.create", ['post' => new Post(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        $post = Post::create($request->validated());

        $post->categories()->sync($request->categories_id);
        
        return back()->with('status', 'Post creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);

        $categories = Category::pluck('id','title');
        
        return view("dashboard.post.show",["post" => $post, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post->categories);
        
        //dd($categories->posts); 

        //$category = Category::with('posts')->get(); 
        //dd($category[1]->posts);
        
        // $posts = Post::whereHas('categories',function(Builder $query){
        //     $query->where('id',3);
        // })->get();
        
        //dd($posts);

        //$category = Category::find(3);

        //dd($post->image->image);

        $categories = Category::pluck('id','title');

        return view("dashboard.post.edit",["post" => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {

        //dd($request->categories_id);

        $post->categories()->sync($request->categories_id);

        $post->update($request->validated());
        
        return back()->with('status', 'Post actualizado con exito');
    }

    public function image(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,bmp,png|max:10240' //10Mb
        ]);

        $filename = time() . "." . $request->image->extension();

        $request->image->move(public_path('images'), $filename);

        PostImage::create(['image' => $filename, 'post_id' => $post->id ]);

        return back()->with('status', 'Imagen cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('status', 'Post eliminado con exito');
    }
}
