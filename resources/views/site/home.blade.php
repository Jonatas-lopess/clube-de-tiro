@extends('templates.site')
@section('content')
<section>
    <article>
        <hr>
        <h3>
            Faça a sua inscrição agora mesmo 
        </h3>

        <div class="artdiv">
            <b>Requisitos minimos para inscrição:</b>
            <ul style="list-style: circle inside;">
                <li>Ser maior de 18 anos;</li>
                <li>Não possuir antecedentes criminais;</li>
            </ul>
        </div>

        <a href="{{route('formulario')}}" class="btn btn-primary">
            Inscrever-se
        </a>
    </article>
    <article>
        <hr>
        <h3>
            Já é um Associado? Acesse a Área Restrita
        </h3>

        <div class="my-3 artdiv">
            Confira aqui todas as suas informações.
        </div>

        <a href="https://clube76.sisct.com.br/site/conta/" class="btn btn-primary">
            Área Restrita
        </a>
    </article>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < count($imagens); $i++)
                @if ($i == 0)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>                    
                @else
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>                    
                @endif
            @endfor
        </ol>
        <div class="carousel-inner">
            @foreach ($imagens as $imagem)
                @if ($loop->index == 0)
                    <div class="carousel-item c-back active">
                        <img class="d-block c-img" src="{{asset('images/'.$imagem)}}" alt="">
                    </div>                  
                @else
                    <div class="carousel-item c-back">
                        <img class="d-block c-img" src="{{asset('images/'.$imagem)}}" alt="">
                    </div>                  
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
@endsection