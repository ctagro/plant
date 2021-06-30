
@extends('adminlte::page')

@section('title', 'Home')


@section('content')

<h4 class="text-dark text-left p-1 font-weight-bold">Registro de atividades</h4>
  

        @if(auth()->user()->competence_id == 1)
        <!-- Image and text -->
        <div class ="row p-2 mb-2 bg-info text-white">
        <nav class="text-white">
            <a class="text-white" href="/activity">
            <img src="{{ asset('img/cards/activity_plant.png')}}" width="30" height="30" class="d-inline-block align-top " alt="">
            Registrar atividades
            </a>
        </nav>
        </div>
  @endif
  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/activity_research">
            <img src="{{ asset('img/cards/sale_plant.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Pesquisar Atividades
            </a>
        </nav>
  </div>
  

  <div class="card">
    <div class="card-header">
        <a href="{{ url('admin/home/index') }}" class="float-right" >Voltar </a> 
    </div>

    </div>



@stop
