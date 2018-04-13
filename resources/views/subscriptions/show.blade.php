@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Inscrição
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading">
                </div>
                <div class="panel-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                     <!-- editando -->
                       
                            {{ Form::open() }}
                            <table class="mui-table ">
                                <tbody>
                                    <thead>
                                       
                                           
                                    <div class="panel-heading"><div class="mui--text-headline">{{$subscription->selectiveprocess->name}}</div></div>
                                            
                                        
                                    </thead>
                                </tbody>
                            </table>
                            <table class="mui-table ">
                                <tbody>

                                <div class="mui-textfield mui-textfield">
                                {{ form::date('start_date',$subscription->selectiveProcess->start_date,['class' => '', 'autofocus', 'disabled'])}}
                                
                                    <label>Data de Inicio</label>
                                </div>

                                <div class="mui-textfield mui-textfield">
                                {{ form::date('end_date',$subscription->selectiveProcess->end_date,['class' => '', 'autofocus', 'disabled'])}}
                                
                                    <label>Data de Fim</label>
                                </div>

                                <div class="mui-textfield mui-textfield--float-label">
                                {{ form::input('text','description',$subscription->selectiveProcess->description,['autofocus', 'disabled'])}}
                                <label>Descrição</label>
                                </div>

                                
                                <table class="mui-table ">
                                <div class="mui-divider"></div>
                                  <tbody>
                                     <thead >                    
                                         <tr>
                                            <th>
                                               Cursos
                                            </th>
                                         </tr>
                                     </thead>
                                        @if ($courseSp->count() == 0)
                                        <tr> 
                                            <p>não há cursos cadastrados</p>
                                        </tr>  
                                        @else
                                            @foreach ($courseSp as $csp)                
                                            <tr>
                                                <td class="">
                                                
                                                <div class="form-group col-md-12 "> 
                                                    <div class="form-group col-md-6 ">
                                                        <div class="mui-checkbox">
                                                        
                                                                    <label>
                                                                    {{ form::checkbox("course[$csp->id][id]",$csp->id,($subscription->selectiveProcess->courses->find($csp->id)) ? true : false, ['id' => ''.$csp->name, 'disabled'])}}
                                                                    {{$csp->name}}
                                                                    </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6 ">
                                                        <div class="mui-textfield mui-textfield--float-label">
                                                            {{ form::input('number',"course[$csp->id][vacancy]",($subscription->selectiveProcess->courses->find($csp->id)) ? ($subscription->selectiveProcess->courses->find($csp->id)->pivot->vacancy) : false,['autofocus', 'disabled'])}}
                                                                                           
                                                        
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
                                        @if ($quotaSp->count() == 0)
                                            <tr class=""> 
                                                <p>não há quotas cadastradas</p>
                                            </tr>    
                                        @else
                                            @foreach ($quotaSp as $qsp)                
                                                <tr>
                                                    <td class="">
                                                        
                                                        <div class="form-group col-md-12 "> 
                                                            <div class="form-group col-md-6 ">
                                                                <div class="mui-checkbox">
                                                                
                                                                            <label>
                                                                            {{ form::checkbox("quotas[$qsp->id][id]",$qsp->id , ($subscription->selectiveProcess->quotas->find($qsp->id)) ? true : false,[ 'id' => ''.$qsp->name, 'disabled'])}}
                                                                            {{$qsp->name}}
                                                                            </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6 ">
                                                                <div class="mui-textfield mui-textfield--float-label">
                                                                            {{ form::input('number',"quotas[$qsp->id][vacancy]",($subscription->selectiveProcess->quotas->find($qsp->id)) ? ($subscription->selectiveProcess->quotas->find($qsp->id)->pivot->vacancy) : false,['autofocus', 'disabled'])}}
                                
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
                                        

                                    <table class="mui-table ">
                                        <tbody>
                                            @if ($courses->count() == 0)
                                                    <tr> 
                                                        <p>não há cursos cadastrados</p>
                                                    </tr>  
                                            @else
                                                    
                                                    <tr>
                                                        <td class="">
                                                            
                                                            <div class="mui-select">
                                                                    
                                                                {{ Form::select('course_id', $courses, null, ['autofocus','disabled']) }} 
                
                                                                    <label>Curso</label>
                                                            </div>
                
                                                        </td>
                                                    </tr> 
                                            
                                            @endif
                                    </tbody>
                                </table>
                            <table class="mui-table ">
                                <tbody>
                                    
                                    @if ($courses->count() == 0)
                                        <tr> 
                                            <p>não há cotas cadastradas</p>
                                        </tr>  
                                    @else
                                                  
                                            <tr>
                                                <td class="">
                                                    <div class="mui-select">
                                                              
                                                         {{ Form::select('quota_id', $quotas, null, ['autofocus', 'disabled']) }} 
        
                                                            <label>Cota</label>
                                                    </div>
                                                    
                                                   </td>
                                            </tr> 
                                    @endif
                                </tbody>
                            </table>
                            

                            <table class="mui-table ">
                                    <tbody>
                                        <thead>
                                            <tr>
                                                <th>
                                                    Valor do Processo Seletivo
                                                </th>
                                            </tr>
                                        </thead>               
                                            <tr>
                                                <td class="">
                                                <div class="mui-textfield mui-textfield--float-label">

                                                    
                                            @foreach ($subscription->exemption as $sbe) 

                                                    @if($sbe->homologated)
                                                        {{ form::input('text','homologated','Isento',['autofocus', 'disabled'])}}
                                                    @else
                                                        {{ form::input('text','homologated','28,90',['autofocus', 'disabled'])}}
                                                    @endif
                                            @endforeach 
                                            
                                                    <label>R$</label>
                                                </div>
                                                                        
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                           
                           
                            
                            <div style="margin-left: calc(58% - 115px);">
                                <a class="mui-btn mui-btn--raised" href="{{url('/home')}}">Voltar</a>
                            </div>
                        {{ Form::close() }}
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>