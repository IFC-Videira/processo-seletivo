@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Dashboard
@endsection 
<style type="text/css">
    .bgimg {
        background-image: linear-gradient(to bottom, rgba(255,255,255,0.85) 0%,rgba(255,255,255,0.85) 100%), url('/img/bg.jpg');
        background-position: right 50%;
    }
    #outer
    {
        width:100%;
    }
    .inner
    {
        display: inline-block;
        color: #3a3f59;
        font-size:18;
    }
</style>
<div class="mui-container">
    


    @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
    @endif
    @if(Session::has('mensagem_aviso'))
                  <div class= "alert alert-warning">{{ Session::get('mensagem_aviso')}}</div>
    @endif
    <div class="row">
        <div class="mui-col-md-8 mui-col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading"><div class="mui--text-headline">Bem-vindo!</div></div>
                <div class="panel-body">
                    <div class="mui--text-subhead">Minhas inscrições:</div><br />                    
                 
                                      
                    @foreach ($subscriptions as $sub)        

                    @if($sub->selectiveProcess->active)
                        <div id="outer" class="mui-panel bgimg">
                            <div class="xs-12 md-8 inner" style="margin-top:15px;">{{$sub->selectiveProcess->name}}</div>      
                            <div class="xs-6 md-4 inner" style="float:right;"><form action="subscriptions/{{ $sub->id }}"><button class="mui-btn mui-btn--small mui-btn--primary mui-btn--fab" style="display: inline-block; font-size: 25; margin-top: 10px; margin-left: calc(100% - 70px);"><img src="/icon/ic_info_outline_white_24px.svg" height="20" width="20" style="margin-left: -4px;"/></button></form></div>
                        </div>
                    @endif                 

                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mui-container">
      <div class="row">
        <div class="mui-col-md-8 mui-col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading"><div class="mui--text-headline">Processos Seletivos Abertos</div></div>
                <div class="panel-body">
                    <div class="mui--text-subhead">Inscreva-se em um processo seletivo:</div><br />                    
                        
                    @foreach ($selectiveprocess as $sp)

                    @if($sp->active)        
                        <div id="outer" class="mui-panel bgimg">
                            <div class="xs-12 md-8 inner" style="margin-top:15px;">{{$sp->name}}</div>      
                            <div class="xs-6 md-4 inner" style="float:right;"><form action="subscriptions/{{$sp->id}}/subscribe"><button class="mui-btn mui-btn--small mui-btn--primary mui-btn--fab" style="display: inline-block; font-size: 25; margin-top: 10px; margin-left: calc(100% - 70px); background-color: #27b522"><img src="/icon/ic_border_color_white_24px.svg" height="20" width="20" style="margin-left: -4px;"/></button></form></div>
                        </div>
                    @endif                 

                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>