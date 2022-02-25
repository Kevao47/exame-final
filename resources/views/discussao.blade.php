@extends('templates.base')

@section('content')
<div class="row tm-content-row tm-mt-big layer1">
    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col layer1">
        <div class="layer1 tm-block h-100">
            <div class="row mb-3">
                <div class="col-md-8 col-sm-12">
                    <h5 class="d-inline-block font-weight-bold">
                        {{$discussao->dono->name}} : {{$discussao->titulo}}
                    </h5>
                </div>
            </div>
            <div class="table-responsive mb-5">
                {{$discussao->texto}}
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <h3 class="tm-block-title d-inline-block text-emphasis">Respostas</h3>
                    @foreach ($discussao->comentarios as $comentario)
                        <div class='comentario'>
                            <div class='comentario-texto'>
                                <span class='font-weight-bold text-emphasis'>{{$comentario->usuario->name}}</span>
                                <p class='text-disabled'>{{$comentario->texto}}</p>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr class='mt-5 text-emphasis' style="border-color:white">
                    <h3 class="tm-block-title d-inline-block text-emphasis">Responder</h3>
                    <form method='post' action="{{ route('comentar', ['id' => $discussao->id]) }}">
                        @csrf
                        <div class="form-group">
                            <x-DefaultInput label='Comentario' name='comentario' class='layer2 text-empashis' style="color: white;"/>
                        </div>
                        <button type="submit" class="btn btn-primary text-emphasis">Responder</button>
                      </form>
                </div>
            </div>

        </div>
    </div>
  
</div>
@endsection