@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Perfis
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading">
                Informe abaixo as informações do novo perfil
                </div>

                <div class="panel-body">


                <!-- incluindo -->
                @if(isset($errors) && count($errors)>0)
                  <div class= "alert alert-danger">
                  
                  @foreach($errors->all() as $error)
                  <p>{{$error}}</p>
                  @endforeach
                  </div>
                @endif  
                {{ Form::open(['route' => 'profiles.store']) }}
                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','name',strtoupper(Auth::user()->name),['autofocus','disabled'])}}

                         <label>Nome</label>
                    </div>

                    <div class="mui-textfield mui-textfield">
                    {{ form::date('date',null,['class' => '', 'autofocus'])}}
                     
                         <label>Data de nascimento</label>
                    </div>

                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','rg',null,['autofocus'])}}
                                           
                         <label>RG</label>
                    </div>

                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','rgemitter',null,['autofocus'])}}

                         <label>Emissor do rg</label>
                    </div>

                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','cpf',null,['autofocus'])}}

                         <label>CPF</label>
                    </div>

                    <div class="mui-select">
                    {{ form::select('sex',  [
                                'masculino' => 'Masculino',
                                'feminino' => 'Feminino'
                                ], null, ['autofocus']) 
                        }}  

                         <label>Sexo</label>
                    </div>

                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','namefather',null,['autofocus'])}}

                         <label>Nome do pai</label>
                    </div>

                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','namemother',null,['autofocus'])}}

                         <label>Nome da mãe</label>
                    </div>

                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','passport',null,['autofocus'])}}

                         <label>Passaporte</label>
                    </div>

                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','naturaless',null,['autofocus'])}}

                         <label>Naturalidade</label>
                    </div>
                    
                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','phone',null,['autofocus'])}}

                         <label>Telefone</label>
                    </div>

                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','mobile',null,['autofocus'])}}

                         <label>Celular</label>
                    </div>

                    <div class="mui-select">
                    {{ Form::select('scholarity',  [
                        'Fundamental - Incompleto' => 'Fundamental - Incompleto',
                        'Fundamental - Completo' => 'Fundamental - Completo',
                        'Médio - Incompleto' => 'Médio - Incompleto',
                        'Médio - Completo' => 'Médio - Completo',
                        'Superior - Incompleto' => 'Superior - Incompleto',
                        'Superior - Completo' => 'Superior - Completo'
                        ], null, ['autofocus']) 
                }}  

                         <label>Escolaridade</label>
                    </div>

                    <legend>NECESSIDADES ESPECIAIS</legend>
                @if ($specialNeeds->count() == 0)

                <p class="mui-textfield mui-textfield" >não há necessidades especiais cadastradas</p>
                
                @else
                    @foreach ($specialNeeds as $sn)

                            
                        

                        <div class="form-group col-md-12 "> 
                            <div class="form-group col-md-3 ">
                                <div class="mui-checkbox">
                                            <label>
                                            {{ form::checkbox("special_need[$sn->id][id]", $sn->id ,null,['id' => ''.$sn->description])}}
                                            {{$sn->description}}
                                            </label>
                                </div>
                            </div>
                                            
                            <div class="form-group col-md-3 ">
                                <div class="mui-textfield mui-textfield--float-label">
                                    {{ form::input('text',"special_need[$sn->id][observation]",null,['autofocus'])}}
                                        
                                    <label>observação</label>
                                </div>
                                            
                            </div>  

                            <div class="form-group col-md-6 "> 
                            
                                <div class="form-group col-md-6 "> 
                                    <div class="mui-textfield mui-textfield">
                                        {{ form::input('text','lblpermanent','Permanente:',['disabled'])}}

                                    </div>
                                </div> 

                                <div class="form-group col-md-3 "> 
                                            <div class="mui-radio ">
                                                <br>
                                                <label>
                                                {{ form::radio("special_need[$sn->id][permanent]", 1) }}
                                            
                                                sim
                                                </label>
                                            </div>             
                                </div>

                                <div class="form-group col-md-3 "> 
                                            <div class="mui-radio ">
                                                <br>
                                                <label>
                                                {{ form::radio("special_need[$sn->id][permanent]", 0) }}
                                            
                                                não
                                                </label>
                                            </div>             
                                </div> 
                            </div> 
                        </div>
                    @endforeach
                @endif
<!-- btn voltar -->
                    <div style="margin-left: calc(50% - 115px);">
                        <a class="mui-btn mui-btn--raised" href="{{url('profiles')}}">Voltar</a>
                        <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                    </div>
                {{ Form::close() }}
                </form>
                </div>
            </div>
        </div>
    </div>
</div>