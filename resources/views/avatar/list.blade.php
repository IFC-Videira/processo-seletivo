@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Inscrição
@endsection
<div class="mui-container">
    <div class="row">
        <div style="width: 50%; left:25%; right: 75%; position: absolute;">
                
                <div class="panel-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif
                    <div style="margin-left: calc(30% - 150px);">
                           
                           
                            <img src="/uploads/avatars/default.jpg" style="width:50px; height:50px; float:left; border-radius:50%; margin-right:25px; "></img>
                          
                           <h2>PERFIL DO {{  $user->name }}</h2>
                    </div>
                </div>
        </div>
    </div>
</div>