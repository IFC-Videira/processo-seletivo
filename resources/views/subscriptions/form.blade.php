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
                    Informe abaixo as informações da inscrição
                </div>
                <div class="panel-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif


                     <!-- incluindo -->
                     {{ Form::open(['url' =>  '/subscriptions/'.$selectiveprocesses->id.'/subscribe_store']) }}
            
                    <table class="mui-table ">
                        <tbody>
                            <thead>
                               
                                   
                            <div class="panel-heading"><div class="mui--text-headline">{{$selectiveprocesses->name}}</div></div>
                                    
                                
                            </thead>
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
                                                      
                                                 {{ Form::select('course_id', $courses, null, ['autofocus']) }} 

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
                                                      
                                                 {{ Form::select('quota_id', $quotas, null, ['autofocus']) }} 

                                                    <label>Cota</label>
                                            </div>
                                            
                                           </td>
                                    </tr> 
                            @endif
                        </tbody>

                        
                    </table>

                    <table class="mui-table ">
                        <tr>
                            <td class="">
                            
                                <div class="mui-textfield mui-textfield--float-label">
                                    {{ Form::textarea('reason', null, ['size' => '30x3']) }}
                                    <label>Motivo da Isenção (Se houver) </label>
                                </div> 
                            </td>
                        </tr> 
            
                    </table>

                   
                    <div style="margin-left: calc(50% - 115px);">
                        <a class="mui-btn mui-btn--raised" href="{{url('/home')}}">Voltar</a>
                        <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                    </div>
                {{ Form::close() }}
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
