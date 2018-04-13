<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    { if (! Auth::user()->permission) {
        return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
    }

        $user = User::all();
        return view('users.list', ['user' => $user]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
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
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }
        $user = User::findorfail($id);
        
        return view('users.edit',['user'=> $user]);
          
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
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }
        $user = user::findorfail($id);
        
        $user->permission = $request->permission;
        
        if($user->save()) {

            \Session::flash('mensagem_sucesso', 'Usuario atualizado com sucesso');
            
            return Redirect::to('users');
        } else {
        
            \Session::flash('mensagem_erro', 'Erro ao atualizar usuario');
            
            return Redirect::to('users.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }
     }

    public function confirmDestroy($id)
    {
        
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }

    }
}
