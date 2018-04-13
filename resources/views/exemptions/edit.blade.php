@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Isenções
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading">
                Informe abaixo as informações da isenção
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
                      {{Form::model($exemption, ['method' => 'PATCH','url' => 'exemptions/'.$exemption->id])}}
                
                    <div class="mui-textfield mui-textfield--float-label">
                        {{ Form::textarea('reason', null, ['size' => '30x3']) }}
                        <label>Motivo da Isenção</label>
                    
                    </div>


                    <div class="mui-checkbox ">
                        {{ form::checkbox('homologated',true)}}
                        <span style="margin-left: 10px;">{{ form::label('homologated','Homologado')}}</span>
                   </div>             

                    <div style="margin-left: calc(50% - 115px);">
                        <a class="mui-btn mui-btn--raised" href="{{url('exemptions')}}">Voltar</a>
                        <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                    </div>
                {{ Form::close() }}
                </form>
                </div>
            </div>
        </div>
    </div>
</div>