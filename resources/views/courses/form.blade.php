@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Cursos
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading">
                Informe abaixo as informações de cursos
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

                @if(Request::is('*/edit'))
                      <!-- editando -->
                      {{Form::model($courses, ['method' => 'PATCH','url' => 'courses/'.$courses->id])}}
                @else
                     <!-- incluindo -->

                {{ Form::open(['route' => 'courses.store']) }}
                @endif
                    <div class="mui-textfield mui-textfield--float-label">
                        {{ form::input('text','name',null,['autofocus'])}}
                        <label>Nome</label>
                    </div>
                    <div style="margin-left: calc(50% - 115px);">
                        <a class="mui-btn mui-btn--raised" href="{{url('courses')}}">Voltar</a>
                        <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                    </div>
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>