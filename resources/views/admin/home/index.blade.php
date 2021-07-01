


@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h3 class="text-dark text-center p-1">Fazenda Santa Luiza</h3>
    <h6 class="card-subtitle text-center">Usuário:  {{ auth()->user()->name }}</h6>
  
@stop

@section('content_header')
<div class="carousel-item">
    <img src="img/santaluiza/plantando_estufa1.jpeg" class="d-block w-100" alt="Cultura de Pimentão">
    <div class="carousel-caption d-md-block">
      <h2>Fazenda Santa Luiza</h2>
      <h3>Plantando estufa 1</h3>
     <!--        <a href="#" class="main-btn">Mais informações</a> -->
    </div>
  </div>
@stop



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

  <div class="card">
    <div class="card-header">
        <a href="{{ url('admin/home/index') }}" class="float-right" >Voltar </a> 
    </div>

    </div>

@stop
