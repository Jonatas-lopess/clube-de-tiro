@extends('templates.painel')

@section('subcontent')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <span>Usúarios</span>
        <small style="color: #777;">Gerenciamento de Usúarios do Painel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-window-maximize"></i> <span>Usúarios</span></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section id="content_section" class="content container-fluid">
        <div class="container py-5 border border-primary rounded" style="background-color: white;">
            <table class="table table-bordered yajra-datatable">
                <thead class="thead-light">
                    <tr>
                        <th class="sized">Registro</th>
                        <th>Nome</th>
                        <th>Permissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Criar Usúario
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
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
                        <label for="email" class="fomulario">E-mail</label>

                        <div class="fomulario">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role" class="fomulario">Permissão</label>

                        <div class="fomulario">
                            <select class="form-control" name="role" id="role" required>
                                <option value="comum">Comum</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 divpass">
                        <label for="password" class="fomulario">Senha</label>

                        <div class="fomulario">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 divpass">
                        <label for="password-confirm" class="fomulario">Confirmar Senha</label>

                        <div class="fomulario">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4 text-right">
                            <button type="submit" class="btn btn-primary">
                                Registrar
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
                <h5 class="modal-title" id="exampleModalLabel2">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('painel.user-update') }}">
                    @csrf

                    <input type="hidden" name="user" id="user">

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
                        <label for="role" class="fomulario">Permissão</label>

                        <div class="fomulario">
                            <select class="form-control" name="role" id="role2" required>
                                <option value="comum">Comum</option>
                                <option value="admin">Admin</option>
                            </select>
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