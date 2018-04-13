<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;
class AddressController extends Controller
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
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
        $address = Address::all();
        return view('addresses.form',['address'=> $address]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address();

        $this->validate($request, $address->rules);
        $address->street = $request->street;
        $address->number = $request->number;
        $address->cep = $request->cep;
        $address->neighborhood = $request->neighborhood;
        $address->typeaddress = $request->typeaddress;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->profile_id = Auth::user()->profile->id;

        if ($address->save()){
            \Session::flash('mensagem_sucesso', 'Endereço cadastrado com sucesso');
            
                return Redirect::to('home');
        }

        else{
            \Session::flash('mensagem_sucesso', 'Erro ao cadastrar endereco');
            
                return Redirect::to('home');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::findorfail($id);
        
        return view('addresses.edit',['address'=> $address]);
          
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
        $address = Address::findorfail($id);

        $this->validate($request, $address->rules);
        
        $address->update($request->all());

        \Session::flash('mensagem_sucesso', 'Endereço atualizado com sucesso!');
        
         return Redirect::to('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
              }

    public function confirmdestroy($id)
    {
        
        

    }
}
