@extends('templates.painel')

@section('subcontent')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <span>Serviços</span>
        <small style="color: #777;">Gerenciamento de Conteúdo da Página Serviços</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-window-maximize"></i> <span>Páginas</span></a></li>
        <li class="active">Serviços</li>
      </ol>
    </section>

    <!-- Main content -->
    <section id="content_section" class="content container-fluid">
        <div class="container py-5 border border-primary rounded" style="background-color: white;">
          <table class="table table-bordered yajra-datatable" id="table-service">
            <thead class="thead-light">
                <tr>
                    <th>Serviços</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Novo Serviço
          </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Serviço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('painel.salvar-service') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="fomulario">Nome</label>

                        <div class="fomulario">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="fomulario">Descrição</label>

                        <div class="fomulario">
                          <textarea class="form-control mb-4" name="description" id="description" rows="7"></textarea>

                            @error('descrpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

        <!-- Modal edit -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Serviço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('painel.service-update') }}">
                    @csrf

                    <input type="hidden" name="service" id="service">

                    <div class="row mb-3">
                        <label for="name" class="fomulario">Nome</label>

                        <div class="fomulario">
                            <input id="name2" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="fomulario">Descrição</label>

                        <div class="fomulario">
                          <textarea class="form-control mb-4" name="description" id="description2" rows="7"></textarea>

                            @error('descrpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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