@extends('templates.painel')

@section('subcontent')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <span>Home</span>
        <small style="color: #777;">Gerenciamento de Conteúdo da Página Home</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-window-maximize"></i> <span>Páginas</span></a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section id="content_section" class="content container-fluid">
        <div class="container py-5 border border-primary rounded" style="background-color: white;">
            <table class="table table-bordered yajra-datatable">
                <thead class="thead-light">
                    <tr>
                        <th>Nº</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                Adicionar Imagem
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center"></div>
            </div>
        </div>
        </div>

        <!-- Modal image -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Adicionar Imagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('painel.upload-image') }}">
                        @csrf

                        <input type="hidden" name="page" id="page" value="home">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="file" name="imagem" id="imagem">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Confirmar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection