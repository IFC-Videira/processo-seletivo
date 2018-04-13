
@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Editar Inscrições
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading">
                Informe abaixo as informações da inscrição
                </div>

                <div class="panel-body">

                @if(isset($errors) && count($errors)>0)
                  <div class= "alert alert-danger">
                  
                  @foreach($errors->all() as $error)
                  <p>{{$error}}</p>
                  @endforeach
                  </div>
                @endif
                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                      <!-- editando -->
                      {{Form::model($subscription, ['method' => 'PATCH','url' => 'subscriptions/'.$subscription->id])}}
                
                      <table class="mui-table ">
                      <tbody>
                          <thead>
                              <div class="panel-heading"><div class="mui--text-headline">{{$subscription->selectiveprocess->name}}</div></div>               
                          </thead>
                      </tbody>
                      </table>

                   <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text', 'name', $subscription->user->name, ['autofocus', 'disabled'])}}
                    <label>Nome usuario</label>
                    </div>

                 
                    <div class="mui-checkbox ">

                        {{ form::checkbox('paid',true)}}
                        <span style="margin-left: 10px;">{{ form::label('paid','Pago')}}</span>
                    </div>  

                    <div style="margin-left: calc(50% - 115px);">
                        <a class="mui-btn mui-btn--raised" href="{{url('subscriptions')}}">Voltar</a>
                        <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                    </div>
                {{ Form::close() }}
                </form>
                </div>
            </div>
        </div>
    </div>
</div>