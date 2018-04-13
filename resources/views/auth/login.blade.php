@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Login
@endsection
<div class="mui-container">
    <div class="row">
        <div class="panel-body" style="width: 50%; left:25%; right: 75%; position: absolute;">
            <p style="margin-left: -15px;">Login</p><br /><br />
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                
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
                        <input id="password" type="password" name="password" value="{{ old('email') }}" required>
                        <label>Senha</label>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar minha senha
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-left: -100px;">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="mui-btn mui-btn--raised mui-btn--primary">Entrar</button>
                        <a class="btn" href="{{ route('password.request') }}">
                            Esqueceu sua senha?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
