<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SelectiveProcess;
use App\Models\Profile;
use App\Models\Subscription;
use Redirect;
use Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        if (! Auth::user()->profile && ! Auth::user()->permission) {
            return redirect()->route('profiles.create')->with('mensagem_sucesso', 'É necessário completar o cadastro');
        }
        if(!Auth::user()->profile && Auth::user()->permission){
            $selectiveprocess =  SelectiveProcess::all();
            $subscriptions = Auth::user()->subscriptions;
    
            return view('home', ['selectiveprocess' => $selectiveprocess, 'subscriptions' => $subscriptions]);
           

        }
        else{
            $profile = Profile::findOrfail(Auth::user()->id);
           
            $selectiveprocess =  SelectiveProcess::all();
            $subscriptions = Auth::user()->subscriptions;
    
            return view('home', ['selectiveprocess' => $selectiveprocess, 'subscriptions' => $subscriptions]);
            
        }
        
    }
}
