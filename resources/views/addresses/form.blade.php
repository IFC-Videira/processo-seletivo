@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Endereços
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">

                <div class="panel-heading">
                    Informe abaixo as informações do endereço
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

              
                     <!-- incluindo -->

                {{ Form::open(['route' => 'addresses.store']) }}
           
              

               <div class="form-group col-md-12 ">
                     <div class="mui-textfield mui-textfield--float-label">
                         {{ form::input('text','cep',null,['maxlength' => 9, 'id' => 'cep'])}}
                         <label>CEP</label>
                    </div>
                </div>
               
                <div class="form-group col-md-9 ">
                    <div class="mui-textfield mui-textfield">
                        {{ form::input('text','street',null,[ 'id' => 'rua'])}}
                        <label>Rua</label>
                    </div>
                </div>

                <div class="form-group col-md-3 ">
                    <div class="mui-textfield mui-textfield">
                        {{ form::input('number','number',null,[ 'id' => 'numero'])}}
                        <label>Nº Endereço</label>
                    </div>
                </div>
              
                <div class="form-group col-md-12 ">
                    <div class="mui-textfield mui-textfield">
                          {{ form::input('text','neighborhood',null,[ 'id' => 'bairro'])}}
                         <label>Bairro</label>
                    </div>
                </div>
                <div class="form-group col-md-9 ">
                    <div class="mui-textfield mui-textfield">
                        {{ form::input('text','city',null,['id' => 'cidade'])}}
                        <label>Cidade</label>
                    </div>
                </div>
                <div class="form-group col-md-3 ">
                    <div class="mui-textfield mui-textfield">
                        {{ form::input('text','state',null, ['id' => 'uf'])}}
                        <label>Estado</label>
                    </div>
                </div>

                <div class="form-group col-md-12 ">
                    <div class="mui-select">
                        {{ Form::select('typeaddress',  [
                            
                            'Comercial' => 'Comercial',
                            'Residencial' => 'Residencial'
                            ], null, ['autofocus']) 
                    }}  

                            <label>Tipo de endereço</label>
                    </div>
                </div>

                        
                
               <!-- btn voltar -->
               <div style="margin-left: calc(50% - 115px);">
               <a class="mui-btn mui-btn--raised" href='profiles/{{Auth::user()->profile->id}}/edit'>Voltar</a>
               <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                 </div>
     
                {{ Form::close() }}              
                </form>  
                </div>
            </div>
        </div>
    </div>
</div>
