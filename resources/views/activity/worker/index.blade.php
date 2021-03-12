<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Funcionário</title>
     <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
    
</body>
</html>

@section('title', 'Listar')

    @extends('adminlte::page')

@section('content')

<div class='table-responsive'>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
      
                <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header">
                                <img class="card-img-top img-responsive img-thumbnail" src="{{ asset('img/cards/worker_plant.jpeg')}}"  style="height: 50px; width: 50px;"alt="Imagem" >
                                Funcionários
                                <a class="float-right" href="{{url('worker/create')}}">Cadastrar</a>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>   
           
                @if(Session::has('mensagem_sucesso'))
                       <div class="alert alert-success"> {{ Session::get('mensagem_sucesso')}}</div>
                @endif

                <table class="table">

                  <th>Foto</th>
                  <th>Nome</th>
                  <th>Admissão</th>
                  <th>Salário</th>
                  <th>Salário por hora</th>


                    <tbody>

                      @foreach($workers as $worker)

                        <tr>
                          <td>
                            <img src="{{ asset('storage/workers/'.$worker->image)}}" class="img-thumbnail elevation-2"  style="max-width: 50px;"> 
                          </td>
                          <td>  
                          <a href= "{{ route('worker.edit' ,[ 'worker' => $worker->id  ])}}" >{{ $worker->name}}</a>
                          </td>
                          <td>  
                            <a href= "{{ route('worker.edit' ,[ 'worker' => $worker->id  ])}}" >{{ $worker->date}}</a>
                            </td>
                            <td>  
                              <a href= "{{ route('worker.edit' ,[ 'worker' => $worker->id ])}}" >{{ number_format($worker->salary, 2 , ',', '.')  }}</a>
                            </td>
                            <td>  
                              <a href= "{{ route('worker.edit' ,[ 'worker' => $worker->id ])}}" >{{ number_format($worker->salary_hour, 2 , ',', '.')  }}</a>
                            </td>
        
                          <td >
            
                            <form id="delete-form"  method="POST" action="{{ route('worker.destroy' ,[ 'worker' => $worker->id ])}}", style = 'display: inline;'> 
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}                 
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>                  
       
        </div>
    </div>
    <div class="card">
      <div class="card-header">
          <a href="{{ url('/home') }}" class="float-right" >Voltar </a> 
      </div>
    </div>
</div>

</div>
@endsection
