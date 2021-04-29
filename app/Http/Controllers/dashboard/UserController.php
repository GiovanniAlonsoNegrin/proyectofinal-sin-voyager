<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
            $users = User::orderBy('created_at','asc')->paginate(10);
            return view("dashboard.user.index", ['users' => $users]);
        }else{
            return back()->with('alert', 'Acceso restringido al módulo: usuarios, solo Administradores');
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
            return view("dashboard.user.create", ['user' => new User()]);
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
    public function store(StoreUserPost $request)
    {
        if (Gate::allows('isAdmin')){
            User::create(
                [
                    'name' => $request['name'],
                    'surname' => $request['surname'],
                    'rol_id' => 3, // user rol
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ]
            );
            return back()->with('status', 'Usuario creada con exito');

        }else{
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (Gate::allows('isAdmin')){
            return view("dashboard.user.show",["user" => $user]);
        }else{
            return back();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::allows('isAdmin')){
            return view("dashboard.user.edit",["user" => $user]);
        }else{
            return back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {
        if (Gate::allows('isAdmin')){
            $user->update(
            [
                'name' => $request['name'],
                'surname' => $request['surname'],
                'email' => $request['email'],
            ]
        );
        
        return back()->with('status', 'Usuario actualizada con exito');
        }else{
            return back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::allows('isAdmin')){
            $user->delete();
            return back()->with('status', 'Usuario eliminada con exito');
            
        }else{
            return back();
        }
        
    }
}
