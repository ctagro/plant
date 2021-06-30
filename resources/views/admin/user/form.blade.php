
 
 
 <div class='table-responsive'>

            <input type="hidden" name="id" value="{{$user->id }}" class="form-control py-3">
            

            <div class="form-group">

                <input type="text" name="user" value="{{old('user') ?? $user->name }}" class="form-control" placeholder="Nome">
                @if($errors->has('user_name'))
                        <h6 class="text-danger" >Digite o Nome</h6> 
                @endif
            </div>

            <div class="form-group">
                <label>E-mail </label>
                    <input type="txt" name="email" value="{{old('email') ?? $user->email }}" class="form-control py-3" placeholder="Descrição">
                    @if($errors->has('email'))
                      <h6 class="text-danger" >Digite o E-mail</h6> 
                    @endif
              </div>

              <div class="form-group">
                <label>Senha </label>
                    <input type="txt" name="password" value="{{old('password') ?? "*****"}}" class="form-control py-3" placeholder="Descrição">
                    @if($errors->has('password'))
                      <h6 class="text-danger" >Digite a password</h6> 
                    @endif
              </div>

              <div class="form-group">
                <label>Competencia </label>
                    <input type="txt" name="competence_id" value="{{old('competence_id') ?? $user->competence_id }}" class="form-control py-3" placeholder="Descrição">
                    @if($errors->has('competence_id'))
                      <h6 class="text-danger" >Digite a competencia</h6> 
                    @endif
              </div>


        
               <!-- Para ativar o uploud de imagens -->
               <div class="form-group">
                @if ($user->image != null)
                    <img src="{{ asset('storage/users/'.$user->image)}}" class="img-thumbnail elevation-2"  style="max-width: 50px;"> 
                @endif
                    <label for="image">Imagem</label>
                    <input type="file" class="form-control"  name='image' value='user_avatar.png'>
            </div>
              
         

            @csrf
                <div class="card">
                    <div class="card-header">
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <a href="{{ url('/user') }}" class="float-right" >Voltar </a> 
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


