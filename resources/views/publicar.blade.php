@extends('templates.base')

@section('content')

<div class="row tm-content-row tm-mt-big">
    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="layer1 tm-block h-100 ">
            <h1>Criar Discussão</h1>
            <form method='POST'>
                @csrf
                <div class="form-group">
                    <x-DefaultInput label='Titulo' name='titulo' class='layer2 text-empashis' style="color: white;"/>
                </div>
              
                <div class="form-group">
                  <label for="texto">Mensagem</label>
                  <textarea class="form-control layer2 text-empashis" id="texto" name='texto' rows="4" style="color: white;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary " style="color: white;">Publicar</button>
              </form>
              
        </div>
    </div>
  
</div>
@endsection