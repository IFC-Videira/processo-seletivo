@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Inscrições
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Deletar Inscrição</div>
                <div class="panel-body">
                    <div class="form-group col-md-12">
                        Ei, Você deseja realmente deletar inscrição?
                    </div>
                
                    <div class="form-group col-md-1">
                    {{ Form::open(['method' => 'DELETE', 'url' => '/subscriptions/'.$subscriptions->id, 'style' => 'display: inline;']) }}
                
                        <button type="submit" class="btn btn-primary btn-sm">
                            SIM
                        </button>
                    {{ Form::close() }}
                    </div>

                    <div class="form-group col-md-11">
                        <a href="../../subscriptions" class="btn btn-danger btn-sm">
                            NÃO
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>