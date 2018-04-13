@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Editar Usuarios
@endsection
<div class="mui-container">
    <div class="row">
        <div class="panel-body" style="width: 50%; left:25%; right: 75%; position: absolute;">
            <p style="margin-left: -15px;">Edição</p><br /><br />
             <!-- editando -->
             {{Form::model($user, ['method' => 'PUT','url' => 'users/'.$user->id])}}
               
              
                 

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','name',null,['autofocus', 'disabled'])}}
                    <label>Nome</label>
                </div>

                <div class="mui-textfield mui-textfield--float-label">
                        {{ Form::email('email', null, ['autofocus', 'disabled']) }} 
                    <label>E-mail</label>
                </div>
                               
                <div class="mui-checkbox ">
                        {{ form::checkbox('permission',true)}}
                        <span style="margin-left: 10px;">{{ form::label('permission','Admin ( Permissão )')}}</span>
                </div>           
                <div class="form-group" style="margin-left: 35px;">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="mui-btn mui-btn--raised mui-btn--primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
</div>
