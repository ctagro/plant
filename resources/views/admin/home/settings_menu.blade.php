
@extends('adminlte::page')

@section('title', 'Home')

@section('content')

<h4 class="text-dark text-left p-1 font-weight-bold">Informações financeiras</h4>
  



        @if(auth()->user()->competence_id == 1)
        <!-- Image and text -->
        <div class ="row p-2 mb-2 bg-info text-white">
        <nav class="text-white">
            <a class="text-white" href="/worker">
            <img src="{{ asset('img/cards/activity_plant.png')}}" width="30" height="30" class="d-inline-block align-top " alt="">
            Funcionários
            </a>
        </nav>
        </div>
  @endif

    @if(auth()->user()->competence_id == 1)
            <!-- Image and text -->
            <div class ="row p-2 mb-2 bg-info text-white">
            <nav class="text-white">
                <a class="text-white" href="/type_activity">
                <img src="{{ asset('img/cards/activity_plant.png')}}" width="30" height="30" class="d-inline-block align-top " alt="">
                Tipo de atividades
                </a>
            </nav>
            </div>
    @endif

  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/ground">
            <img src="{{ asset('img/cards/sale_plant.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Áreas de Plantio
            </a>
        </nav>
  </div>


  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/accounting">
                <img src="{{ asset('img/cards/activity_plant.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                Tipo de contas
                </a>
            </nav>
  </div>

  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/crop">
                <img src="{{ asset('img/cards/sale_plant.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                Culturas
                </a>
            </nav>
  </div>

  <div class ="row p-2 mb-2 bg-info text-white">
    <nav class="text-white">
        <a class="text-white" href="/product">
                <img src="{{ asset('img/cards/fluxo_de_caixa.jpeg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                Fertilizantes
                </a>
            </nav>
  </div>
  
            <div class ="row p-2 mb-2 bg-info text-white">
                <nav class="text-white">
                    <a class="text-white" href="/pesticide">
                            <img src="{{ asset('img/cards/fluxo_de_caixa.jpeg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                            Defensivos
                            </a>
                        </nav>
              </div>
       
            <div class ="row p-2 mb-2 bg-info text-white">
                <nav class="text-white">
                    <a class="text-white" href="/active_principle">
                            <img src="{{ asset('img/cards/fluxo_de_caixa.jpeg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                            Principio ativo
                            </a>
                        </nav>
              </div>
  
            <div class ="row p-2 mb-2 bg-info text-white">
                <nav class="text-white">
                    <a class="text-white" href="/disease">
                            <img src="{{ asset('img/cards/fluxo_de_caixa.jpeg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                            Pragas / Doenças
                            </a>
                        </nav>
              </div>
              
            <div class ="row p-2 mb-2 bg-info text-white">
                <nav class="text-white">
                    <a class="text-white" href="/category_pesticide">
                            <img src="{{ asset('img/cards/fluxo_de_caixa.jpeg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                            Categoria de defensivo
                            </a>
                        </nav>
              </div>
              

        @if(auth()->user()->competence_id == 1)
            <!-- Image and text -->
            <div class ="row p-2 mb-2 bg-info text-white">
            <nav class="text-white">
                <a class="text-white" href="/bayer">
                <img src="{{ asset('img/cards/activity_plant.png')}}" width="30" height="30" class="d-inline-block align-top " alt="">
                Compradores
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
