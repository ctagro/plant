
@extends('adminlte::page')

@section('title', 'Home')

@section('content')

<h4 class="text-dark text-left p-1 font-weight-bold">Informações financeiras</h4>
  
@if(auth()->user()->competence_id == 1)
        <!-- Image and text -->
        <div class ="row p-2 mb-2 bg-info text-white">
        <nav class="text-white">
            <a class="text-white" href="/account">
            <img src="{{ asset('img/cards/activity_plant.png')}}" width="30" height="30" class="d-inline-block align-top " alt="">
            Registrar despesas
            </a>
        </nav>
        </div>
  @endif
  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/sales">
            <img src="{{ asset('img/cards/sale_plant.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Registrar vendas
            </a>
        </nav>
  </div>
  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/account_research">
                <img src="{{ asset('img/cards/activity_plant.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                Pesquisar Movimentações
                </a>
            </nav>
  </div>
  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/sale_research">
                <img src="{{ asset('img/cards/sale_plant.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                Pesquisar Vendas
                </a>
            </nav>
  </div>
  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/cash_flow">
                <img src="{{ asset('img/cards/fluxo_de_caixa.jpeg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                Fluxo de caixa
                </a>
            </nav>
  </div>

  @if(auth()->user()->competence_id == 1)
  <!-- Image and text -->
  <div class ="row p-2 mb-2 bg-info text-white">
  <nav class="text-white">
      <a class="text-white" href="/result_area">
      <img src="{{ asset('img/cards/activity_plant.png')}}" width="30" height="30" class="d-inline-block align-top " alt="">
      Resultado por área
      </a>
  </nav>
  </div>
@endif

  <div class="card">
    <div class="card-header">
        <a href="{{ url('admin/home/index') }}" class="float-right" >Voltar </a> 
    </div>

    </div>



@stop
