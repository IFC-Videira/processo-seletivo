@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Registrar
@endsection
<div class="mui-container">
    <div class="row">
        <div class="panel-body" style="width: 50%; left:25%; right: 75%; position: absolute;">
            <p style="margin-left: -15px;">Registro</p><br /><br />
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="mui-textfield mui-textfield--float-label">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        <label>Nome</label>
                    </div>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                     @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="mui-textfield mui-textfield--float-label">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        <label>E-mail</label>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="mui-textfield mui-textfield--float-label">
                        <input id="password" type="password" name="password" required>
                        <label>Senha</label>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="mui-textfield mui-textfield--float-label">
                        <input id="password-confirm" type="password" name="password_confirmation" required>
                        <label>Confirmação de Senha</label>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 35px;">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="mui-btn mui-btn--raised mui-btn--primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
</div>
