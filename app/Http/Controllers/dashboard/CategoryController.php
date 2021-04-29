<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCategoryPost;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (Gate::allows('isAdmin')){
            $categories = Category::orderBy('created_at','asc')->paginate(10);
            return view("dashboard.category.index", ['categories' => $categories]);
            
        }else{
            return back()->with('alert', 'Acceso restringido al módulo: categorías, solo Administradores');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('isAdmin')){
            return view("dashboard.category.create", ['category' => new Category()]);
        }else{
            return back();        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {
        if (Gate::allows('isAdmin')){
            Category::create($request->validated());
            return back()->with('status', 'Categoría creada con exito');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if (Gate::allows('isAdmin')){
            return view("dashboard.category.show",["category" => $category]);
        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (Gate::allows('isAdmin')){
            return view("dashboard.category.edit",["category" => $category]);
        }else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryPost $request, Category $category)
    {
        if (Gate::allows('isAdmin')){
            $category->update($request->validated());
            return back()->with('status', 'Categoría actualizada con exito');
        }else{
            return back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Gate::allows('isAdmin')){
            $category->delete();
            return back()->with('status', 'Categoría eliminada con exito');
        }else{
            return back();
        }
        
    }
}
