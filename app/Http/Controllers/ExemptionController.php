<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Exemption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;

class ExemptionController extends Controller
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
    {
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }
        $exemption = Exemption::all();
        return view('exemptions.list',compact('exemption'));
   
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
        $exemption = Exemption::findorfail($id);
        
        return view('exemptions.edit',['exemption'=> $exemption]);
          
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

        $exemption = Exemption::findorfail($id);

        $exemption->update($request->all());

        if($exemption->save()) {
            \Session::flash('mensagem_sucesso', 'Isemção atualizada com sucesso');
            
            return Redirect::to('exemptions'); 
        } else {

            \Session::flash('mensagem_error', 'Erro ao atualizar isencão');
            
            return Redirect::to('exemptions'); 
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

        $exemption = Exemption::findorfail($id);

        $exemption->delete();

        return redirect()->route('exemptions.index')->with('success_message', 'Isenção deletada com sucesso.');
 
     }

    public function confirmDestroy($id)
    {
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }

        $exemption = Exemption::findorfail($id);
        
        return view('exemptions.deleteConfirm',['exemption'=> $exemption]);


    }
}
