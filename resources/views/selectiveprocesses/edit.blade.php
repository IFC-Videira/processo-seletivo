@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Processos Seletivos
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">

                <div class="panel-heading">
                    Informe abaixo as informações do processo seletivo
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
                      {{Form::model($selectiveprocesses, ['method' => 'PATCH','url' => 'selectiveprocesses/'.$selectiveprocesses->id])}}
               

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','name',null)}}
                    <label>Nome</label>
                </div>

                <div class="mui-textfield mui-textfield">
                {{ form::date('start_date',null,['class' => '', 'autofocus'])}}
                 
                     <label>Data de Inicio</label>
                </div>

                <div class="mui-textfield mui-textfield">
                {{ form::date('end_date',null,['class' => '', 'autofocus'])}}
                 
                     <label>Data de Fim</label>
                </div>

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','description')}}
                    <label>Descrição</label>
                </div>

                <div class="mui-checkbox ">
                    {{ form::checkbox('active',true)}}
                    <span style="margin-left: 10px;">{{ form::label('active','Ativo')}}</span>
                </div>             

                <div  style="margin-top: 50px;" class="mui-divider"></div>

                <table class="mui-table ">
                <tbody>
                <thead >
                    <tr>
                        <th>
                            Cursos
                        </th>
                    </tr>
                </thead>
                @if ($courses->count() == 0)
                        <tr> 
                            <p>não há cursos cadastrados</p>
                        </tr>  
                @else
                    @foreach ($courses as $csp)                
                        <tr>
                            <td class="">
                            
                            <div class="form-group col-md-12 "> 
                                <div class="form-group col-md-6 ">
                                    <div class="mui-checkbox">
                                    
                                            <label>
                                            {{ form::checkbox("course[$csp->id][id]",$csp->id,($selectiveprocesses->courses->find($csp->id)) ? true : false, ['id' => ''.$csp->name])}}
                                            {{$csp->name}}
                                            </label>
                                    </div>
                                 </div>

                                 <div class="form-group col-md-6 ">
                                    <div class="mui-textfield mui-textfield--float-label">
                                            {{ form::input('number',"course[$csp->id][vacancy]",($selectiveprocesses->courses->find($csp->id)) ? ($selectiveprocesses->courses->find($csp->id)->pivot->vacancy) : false,['autofocus'])}}
                                    
                                        <label>Vagas</label>
                                    </div>
                                 </div>

                            </div>
                            </td>
                        </tr> 
                    @endforeach
                @endif
                </tbody>
                </table>

                <div class="mui-divider"></div>
                
                <table class="mui-table ">
                <tbody>
                <thead>
                    <tr>
                        <th>
                            Cotas
                        </th>
                    </tr>
                </thead>
                @if ($quotas->count() == 0)
                    <tr class=""> 
                        <p>não há cursos cadastrados</p>
                    </tr>    
                @else
                    @foreach ($quotas as $qsp)                
                        <tr>
                        <td class="">
                            
                            <div class="form-group col-md-12 "> 
                                <div class="form-group col-md-6 ">
                                    <div class="mui-checkbox">
                                    
                                    <label>
                                    {{ form::checkbox("quotas[$qsp->id][id]",$qsp->id , ($selectiveprocesses->quotas->find($qsp->id)) ? true : false,[ 'id' => ''.$qsp->name])}}
                                    {{$qsp->name}}
                                    </label>

                                    </div>
                                 </div>

                                 <div class="form-group col-md-6 ">
                                    <div class="mui-textfield mui-textfield--float-label">
                                    {{ form::input('number',"quotas[$qsp->id][vacancy]",($selectiveprocesses->quotas->find($qsp->id)) ? ($selectiveprocesses->quotas->find($qsp->id)->pivot->vacancy) : false,['autofocus'])}}
                                    
                                        <label>Vagas</label>
                                    </div>
                                 </div>

                            </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                </table>
               <!-- btn voltar -->
               <div style="margin-left: calc(50% - 115px);">
               <a class="mui-btn mui-btn--raised" href="{{url('selectiveprocesses')}}">Voltar</a>
               <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                 </div>
     
                {{ Form::close() }}              
                </form>  
                </div>
            </div>
        </div>
    </div>
</div>
