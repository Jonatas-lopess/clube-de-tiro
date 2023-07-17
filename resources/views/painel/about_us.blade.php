@extends('templates.painel')

@section('subcontent')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <span>Sobre Nós</span>
        <small style="color: #777;">Gerenciamento de Conteúdo da Página Sobre Nós</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-window-maximize"></i> <span>Páginas</span></a></li>
        <li class="active">Sobre Nós</li>
      </ol>
    </section>

    <!-- Main content -->
    <section id="content_section" class="content container-fluid">
        <div class="container py-5 border border-primary rounded" style="background-color: white;">
            <form action="{{ route('painel.salvar-about') }}" method="post" id="about_form">
                @csrf

                <label for="about_us_text">Texto "Sobre":</label>
                <textarea class="form-control mb-4" name="content" id="about_us_text" rows="7">{{$text}}</textarea>
                <button class="btn btn-success" type="submit">Salvar</button>
            </form>
        </div>
    </section>
@endsection