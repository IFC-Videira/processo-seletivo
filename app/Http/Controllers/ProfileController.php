<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\SpecialNeed;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;
class ProfileController extends Controller
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
        $profile = Profile::all();
        return view('profiles.list',['profile'=> $profile]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        if (Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não precisa preencher o perfil pois é Admin');
        }
        $profile = Profile::all();
        $specialNeeds = SpecialNeed::all();

        return view('profiles.form',['profile'=> $profile, 'specialNeeds' => $specialNeeds]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profile();
        
        $message =[

            'name.required' => 'O campo descrição é de preenchimento obrigatório.',
            'name.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
            'name.max' => 'O Número máximo de caracteres atingido para o campo descrição.',
            'rg.required' => 'O campo descrição é de preenchimento obrigatório.',
            'rg.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
            'rg.max' => 'O Número máximo de caracteres atingido para o campo descrição.'



            
        ];
        $validate = Validator::make($request->all(), $profile->rules, $message);

        if($validate->fails()){

            return Redirect::to('profiles/create')
                            ->WithErrors($validate)
                            ->withInput();
        }
            
        $profile->date = $request->date;
        $profile->rg = $request->rg;
        $profile->rgemitter = $request->rgemitter;
        $profile->cpf = $request->cpf;
        $profile->sex = $request->sex;
        $profile->namefather = $request->namefather;
        $profile->namemother = $request->namemother;
        $profile->passport = $request->passport;
        $profile->naturaless = $request->naturaless;
        $profile->phone = $request->phone;
        $profile->mobile = $request->mobile;
        $profile->scholarity = $request->scholarity;
        $profile->user_id = Auth::user()->id;

        $status = $profile->save();
        
                $selected_special_needs = array();
               
        
                if(($request->special_need)){
                    
                                $a = $request->special_need;
                                foreach ($a as $sn) {
                                    if(array_key_exists('id', $sn)) {
                                        $selected_special_needs[$sn['id']] = array('observation' => "".$sn['observation'], 'permanent' => $sn['permanent']);
                                    
                                    }
                                }
                            }
                    

        $profile->specialNeeds()->sync($selected_special_needs);

            if ($status){
                \Session::flash('mensagem_sucesso', 'Perfil cadastrado com sucesso');
                
                 return Redirect::to('addresses/create');
            } else {
                \Session::flash('mensagem_sucesso', 'Perfil cadastrado com sucesso');
                
                 return Redirect::to('profiles/create');
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
        $profile = Profile::findorfail($id);
        $specialNeeds = SpecialNeed::all();

        return view('profiles.edit',compact('profile','specialNeeds'));
          
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
        $profile = Profile::findorfail($id);

        $message =[
            
                        'name.required' => 'O campo descrição é de preenchimento obrigatório.',
                        'name.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
                        'name.max' => 'O Número máximo de caracteres atingido para o campo descrição.',
                        'rg.required' => 'O campo descrição é de preenchimento obrigatório.',
                        'rg.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
                        'rg.max' => 'O Número máximo de caracteres atingido para o campo descrição.'
                    ];
        $validate = Validator::make($request->all(), $profile->rules, $message);
            
        if($validate->fails()){
            
            return Redirect::to('profiles/create')
                ->WithErrors($validate)
                ->withInput();
        }
                        
        $profile->date = $request->date;
        $profile->rg = $request->rg;
        $profile->rgemitter = $request->rgemitter;
        $profile->cpf = $request->cpf;
        $profile->sex = $request->sex;
        $profile->namefather = $request->namefather;
        $profile->namemother = $request->namemother;
        $profile->passport = $request->passport;
        $profile->naturaless = $request->naturaless;
        $profile->phone = $request->phone;
        $profile->mobile = $request->mobile;
        $profile->scholarity = $request->scholarity;

        $profile->user_id = Auth::user()->id;
        $status = $profile->save();
        
                $selected_special_needs = array();
               
        
                if(($request->special_need)){
                    
                                $a = $request->special_need;
                                foreach ($a as $sn) {
                                    if(array_key_exists('id', $sn)) {
                                        $selected_special_needs[$sn['id']] = array('observation' => "".$sn['observation'], 'permanent' => $sn['permanent']);
                                    
                                    }
                                }
                            }

        $profile->specialNeeds()->sync($selected_special_needs);

        
        if ($status){
            \Session::flash('mensagem_sucesso', 'Perfil atualizado com sucesso, Se necessario atualize seu endereço');
            
             return Redirect::to('addresses/'.$profile->address->id.'/edit');
        } else {
            \Session::flash('mensagem_sucesso', 'Erro ao atualizar o perfil.');
            
             return Redirect::to('profiles');
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
        $profile = Profile::findorfail($id);
        
        $profile->delete();

       \Session::flash('mensagem_sucesso', 'Perfil deletado com sucesso');
       
        return Redirect::to('profiles');
 
        
     }

    public function confirmdestroy($id)
    {
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }
        
        $profile = Profile::findorfail($id);
        
        return view('profiles.deleteConfirm',['profile'=> $profile]);


    }

}
