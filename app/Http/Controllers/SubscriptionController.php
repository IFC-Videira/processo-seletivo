<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\Course;
use App\Models\Quota;
use App\Models\Exemption;
use App\Models\SelectiveProcess;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;


class SubscriptionController extends Controller
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
        $subscriptions = Subscription::all();

        return view('subscriptions.list',['subscription'=> $subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
        if (! Auth::user()->permission) {
            return redirect()->route('home')->with('mensagem_aviso', 'Você não tem permissao para acessar esta pagina.');
        }

       
          
    }

    public function subscribe($id)
    { 

        if (! Auth::user()->permission) {
            $subscription = new Subscription;
            $quotas = Quota::all()->pluck('name','id');
            $courses = Course::all()->pluck('name','id');
            $selectiveprocesses = SelectiveProcess::findOrFail($id);
          
           
    
            return view('subscriptions.form',['subscription'=> $subscription,'courses'=> $courses, 'quotas'=> $quotas, 'selectiveprocesses'=> $selectiveprocesses]);
            
        
        }else{
            return redirect()->route('home')->with('mensagem_aviso', 'Você não pode se inscrever em processo seletivo como ADMINISTRADOR!, Deslogue e tente novamente como usuario comum');
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

        $subscriptions = new Subscription();
        //dd()

        //$subscriptions->selective_process_id = $request->$selectiveprocesses->id;
        $subscriptions->quota_id = $request->quota_id;
        $subscriptions->course_id = $request->course_id;
        $subscriptions->user_id = Auth::user()->id;

        if($course->save()) {
            
        \Session::flash('mensagem_sucesso', 'Inscrição cadastrada com sucesso');
                        
        return Redirect::to('subscriptions/create');
        } else {
                    
        \Session::flash('mensagem_sucesso', 'Erro ao cadastrar curso');
                        
        return Redirect::to('courses.create');
        }
    }

    public function subscribeStore(Request $request, $id)
    {

        $subscriptions = new Subscription();

        $subscriptions->selective_process_id = $id;
        $subscriptions->quota_id = $request->quota_id;
        $subscriptions->course_id = $request->course_id;
        $subscriptions->paid = 0;
        $subscriptions->user_id = Auth::user()->id;

        if($subscriptions->save()) {
        
        $exemption = new Exemption();
       
        $exemption->reason = $request->reason;
        $exemption->subscription_id = $subscriptions->id;
        $exemption->save();
        
            
        \Session::flash('mensagem_sucesso', 'Inscrição cadastrada com sucesso');
                        
        return Redirect::to('/home');
        } else {
                    
        \Session::flash('mensagem_sucesso', 'Erro ao cadastrar inscricao');
                        
        return Redirect::to('courses.create');
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
        
        $subscription = Subscription::findorfail($id);       
        $courses = Course::all()->pluck('name', 'id');
        $courseSp = Course::all();
        $quotas = Quota::all()->pluck('name', 'id');
        $quotaSp = Quota::all();
        $selectiveprocesses = SelectiveProcess::all();
       

        return view('subscriptions.show',['subscription'=> $subscription,'courses'=> $courses,'courseSp'=> $courseSp, 'quotas'=> $quotas, 'quotaSp'=> $quotaSp, 'selectiveprocesses'=> $selectiveprocesses]);
    
          
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
        $subscription = Subscription::findOrfail($id);
        
        return view('subscriptions.edit',['subscription'=> $subscription]);
            
        
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
        $subscription = Subscription::findorfail($id);
        
        $subscription->paid = $request->paid;

        $subscription->save();

        \Session::flash('mensagem_sucesso', 'Inscrição atualizada com sucesso!');
        
         return Redirect::to('subscriptions');
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
       $subscriptions = Subscription::findorfail($id);
       
       $subscriptions->delete();

      \Session::flash('mensagem_sucesso', 'Inscrição deletada com sucesso!');
      
       return Redirect::to('subscriptions');

    }

    public function confirmDestroy($id)
    { 
        
        if (! Auth::user()->permission) {
        return redirect()->route('home')->with('mensagem_aviso', 'Você não tem os privilegios para acessar esta pagina');
        }

        $subscriptions = Subscription::findorfail($id);
        
        return view('subscriptions.deleteConfirm',['subscriptions'=> $subscriptions]);


    }
}