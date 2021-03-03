

 <div class='table-responsive'>

            <input type="hidden" name="id" value="{{$activity->id }}" class="form-control py-3">

              
                <div class="form-group">
                    <select name="type_activity_id"  id="type_activity_id" class="form-control">
                        @foreach($type_activitys as $type_activity)

                          <option value="{{$type_activity->id}}" {{ $type_activity->id == $activity->type_activity_id ? 'selected' : ''}}>{{$type_activity->description}} </option> 
                            
                        @endforeach
                    </select>
                    @if($errors->has('type_activity_id'))
                        <h6 class="text-danger" >Escolha a Atividade</h6> 
                    @endif
                </div>

                <div class="form-group">

                    @if(!Request::is('*/edit'))
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}" class="form-control py-3">
                        <input type="date" name="date"  value="{{old('$date(d/m/y)') ?? $activity->date }}"  class="form-control py-3" placeholder="$data">
                        @if($errors->has('date'))
                                <h6 class="text-danger" >Digite a data</h6> 
                        @endif
        
                    @else
                        <?php $data = $activity->date ?>
                    <label for="date">Data : {{$data}}</label>
                        <input type="date" name="date" id ="date" value="{{old('$date(d/m/Y)') ?? $activity->date}}"  class="form-control py-3" placeholder="$data">  
                        @if($errors->has('date'))
                        <h6 class="text-danger" >Digite a data</h6> 
                @endif           
                    @endif
        
                </div>

                    <div class="form-group">
                        <input type="txt" name="crop" value="{{old('crop') ?? $activity->crop }}" class="form-control py-3" placeholder="Área">
                        @if($errors->has('crop'))
                            <h6 class="text-danger" >Digite a Área</h6> 
                        @endif
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <!--    <label for="work_id">Escolha o funcionário</label> -->
                        <label for="worker_id">Funcionário</label>  
                        <select name="worker_id"  id="worker_id" class="form-control">
                                @foreach($workers as $worker)
                                    
                                    <p>{{$worker->id}}</p>
                                        <option value="{{$worker->id}}" {{ $worker->id == $activity->worker_id ? 'selected' : ''}}>{{$worker->name}} </option>
                                    
                                @endforeach
                            </select>
                            @if($errors->has('worker'))
                                <h6 class="text-danger" >Digite o nome do funcionário</h6> 
                            @endif
                        </div>

                    <div class="form-group">
                        <input type="txt" name="product" value="{{old('product') ?? $activity->product }}" class="form-control py-3" placeholder="Produto usado">
                        @if($errors->has('product'))
                            <h6 class="text-danger" >Digite o Produto usado</h6> 
                        @endif
                    </div>

                </div>


{{-- Hora de inico e fim da atividade inabilitada
     Para habilitar: remover os inputs hidden abaixo e ativar os inputs desse comentario

                    <div class="form-group">
                        <label>Hora de início da atividade: </label>
                        <input type="time"  name="start_time" value="{{old('start_time') ?? $activity->start_time }}"  >
                          @if($errors->has('valor'))
                              <h6 class="text-danger" >Digite o horario do inicio</h6> 
                          @endif
                      </div> 

                      <div class="form-group">
                        <label>Hora de término da atividade: </label>
                        <input type="time"  name="final_time" value="{{old('final_time') ?? $activity->final_time }}"  >
                          @if($errors->has('valor'))
                              <h6 class="text-danger" >Digite o horario do inicio</h6> 
                          @endif
                      </div> 
--}}


                        <input type="hidden" name="start_time" value="00:00" class="form-control py-3">
                        <input type="hidden" name="final_time" value="00:00" class="form-control py-3">        


                      <div class="form-group">
                        <label>Tempo da atividade: </label>
                        <input type="number"  name="worked_hours" value="{{old('valor') ?? $activity->worked_hours }}"  placeholder="0.00" step="0.01" >
                          @if($errors->has('worked_hours'))
                              <h6 class="text-danger" >Digite tempo de atividade</h6> 
                          @endif
                      </div> 



            <div class="form-group">

                <label for="note">Observações</label>
                <textarea class="form-control" rows="3" placeholder="Observação..." name="note" > {{old('note') ? $activity->note : "..."}} </textarea>
            </div>

            @csrf
                <div class="card">
                    <div class="card-header">
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <a href="{{ url('/activity') }}" class="float-right" >Voltar </a> 
                    </div>
                </div>
</div>


<!-- ./wrapper -->
<!-- jQuery -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
    window.location.href='#ancora';
</script>
<!-- page script -->


