<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\SelectiveProcess;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Quota;
use App\Models\Course;

class SelectiveProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }
        $selectiveprocesses = SelectiveProcess::all();
        

        return view('selectiveprocesses.list',['selectiveprocesses'=> $selectiveprocesses]);
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
        
        $selectiveprocess = SelectiveProcess::all();
        $quotas = Quota::all();
        $courses = Course::all();
        return view('selectiveprocesses.form',['selectiveprocess'=> $selectiveprocess,'courses'=> $courses ,'quotas'=> $quotas]);
        
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
        //dd($request);
        $selectiveprocess = new SelectiveProcess();
    //$this->validate($request, $quota->rules);

    $message =[
        
                    'name.required' => 'O campo nome é de preenchimento obrigatório.',
                    'name.min' => 'O Número mínimo para preencher o campo nome é de 3 caracteres.',
                    'name.max' => 'O Número máximo de caracteres foi atingido para o campo nome.',
                   
                    'start_date.required' => 'O campo data inicio é de preenchimento obrigatório.',
                    'start_date.date' => 'formato de data invalido',
                    'start_date.date' => 'A data de inicio não pode vir depois da data de fim.',


                    'end_date.required' => 'O campo data fim é de preenchimento obrigatório.',
                    'end_date.date' => 'formato de data invalido',
                    'end_date.date' => 'A data de fim não pode vir antes da data de inicio.',
                   
                    'active.required' => 'O campo ativo é de preenchimento obrigatório',

                    'description.required' => 'O campo descrição é de preenchimento obrigatório.',
                    'description.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
                    'description.max' => 'O Número máximo de caracteres foi atingido para o campo descrição.'
                  
        
                ];
                $validate = Validator::make($request->all(), $selectiveprocess->rules, $message);
        
                if($validate->fails()){
        
                    return Redirect::to('selectiveprocesses/create')
                                    ->WithErrors($validate)
                                    ->withInput();
                }

        $selectiveprocess->name = $request->name;
        $selectiveprocess->start_date = $request->start_date;
        $selectiveprocess->end_date = $request->end_date;
        $selectiveprocess->description = $request->description;
        $selectiveprocess->active = $request->active;

        $status = $selectiveprocess->save();

        $selected_courses = array();
        $selected_quotas = array();
     
        foreach ($request->course as $course) {
            if(array_key_exists('id', $course)) {
                $selected_courses[$course['id']] = array('vacancy' => "".$course['vacancy']);
            }
        }

       // dd($selected_courses);

        $selectiveprocess->courses()->sync($selected_courses);


        foreach ($request->quotas as $quotas) {
            if(array_key_exists('id', $quotas)) {
                $selected_quotas[$quotas['id']] = array('vacancy' => "".$quotas['vacancy']);
            }
        }

        $selectiveprocess->quotas()->sync($selected_quotas);

        if ($status){
            \Session::flash('mensagem_sucesso', 'Processo Seletivo cadastrado com sucesso!');
            
             return Redirect::to('selectiveprocesses');
        } else {
            \Session::flash('error', 'Ocorreu algum erro ao cadastrar o Processo Seletivo!');
            
             return Redirect::to('selectiveprocesses/create');
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
        $selectiveprocess = SelectiveProcess::findorfail($id);

        $quotas = Quota::all();
        $courses = Course::all();
        return view('selectiveprocesses.edit',['selectiveprocesses'=> $selectiveprocess,'courses'=> $courses ,'quotas'=> $quotas]);
          
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
        $selectiveprocess = SelectiveProcess::findorfail($id);
        
        
    //$this->validate($request, $quota->rules);

    $message =[
        
                    'name.required' => 'O campo nome é de preenchimento obrigatório.',
                    'name.min' => 'O Número mínimo para preencher o campo nome é de 3 caracteres.',
                    'name.max' => 'O Número máximo de caracteres foi atingido para o campo nome.',
                   
                    'start_date.required' => 'O campo data inicio é de preenchimento obrigatório.',
                    'start_date.date' => 'formato de data invalido',
                    'start_date.date' => 'A data de inicio não pode vir depois da data de fim.',


                    'end_date.required' => 'O campo data fim é de preenchimento obrigatório.',
                    'end_date.date' => 'formato de data invalido',
                    'end_date.date' => 'A data de fim não pode vir antes da data de inicio.',
                   
                    'active.required' => 'O campo ativo é de preenchimento obrigatório',

                    'description.required' => 'O campo descrição é de preenchimento obrigatório.',
                    'description.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
                    'description.max' => 'O Número máximo de caracteres foi atingido para o campo descrição.'
                  
        
                ];
                $validate = Validator::make($request->all(), $selectiveprocess->rules, $message);
        
                if($validate->fails()){
        
                    return Redirect::to('selectiveprocesses/create')
                                    ->WithErrors($validate)
                                    ->withInput();
                }

        $selectiveprocess->name = $request->name;
        $selectiveprocess->start_date = $request->start_date;
        $selectiveprocess->end_date = $request->end_date;
        $selectiveprocess->description = $request->description;
        $selectiveprocess->active = $request->active;

        $status = $selectiveprocess->update();

        $selected_courses = array();
        $selected_quotas = array();
     
        foreach ($request->course as $course) {
            if(array_key_exists('id', $course)) {
                $selected_courses[$course['id']] = array('vacancy' => "".$course['vacancy']);
            }
        }

       // dd($selected_courses);

        $selectiveprocess->courses()->sync($selected_courses);


        foreach ($request->quotas as $quotas) {
            if(array_key_exists('id', $quotas)) {
                $selected_quotas[$quotas['id']] = array('vacancy' => "".$quotas['vacancy']);
            }
        }

        $selectiveprocess->quotas()->sync($selected_quotas);

        if ($status){
            \Session::flash('mensagem_sucesso', 'Processo Seletivo atualizado com sucesso!');
            
             return Redirect::to('selectiveprocesses');
        } else {
            \Session::flash('error', 'Ocorreu algum erro ao cadastrar o Processo Seletivo!');
            
             return Redirect::to('selectiveprocesses/create');
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