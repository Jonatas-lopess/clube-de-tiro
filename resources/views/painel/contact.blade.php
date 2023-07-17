@extends('templates.painel')

@section('subcontent')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <span>Contato</span>
        <small style="color: #777;">Gerenciamento de Conteúdo da Página Contato</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-window-maximize"></i> <span>Páginas</span></a></li>
        <li class="active">Contato</li>
      </ol>
    </section>

    <!-- Main content -->
    <section id="content_section" class="content container-fluid">
        <div class="container py-5 border border-primary rounded" style="background-color: white;">
            <form action="{{ route('painel.salvar-contact') }}" method="post" id="contact_form">
                @csrf

                <div class="mb-2">
                    <label for="contact_email">Email:</label>
                    <input class="form-control" name="contact_email" id="contact_email" type="email" value="{{$email}}">
                </div>
                <div class="mb-2">
                    <label for="contact_number">Whatsapp:</label>
                    <input class="form-control" name="contact_number" id="contact_number" type="tel" value="{{$number}}">
                </div>
                <div class="mb-4">
                    <label for="">QRCode:</label>
                    <img src="{{asset('images/'.$qrcode)}}" alt="Fale conosco pelo Whatsapp" id="qrcode">
                </div>


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                    Adicionar QRCode
                </button>

                <button class="btn btn-success" type="submit">Salvar</button>
            </form>
        </div>

        <!-- Modal image -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Adicionar QRCode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('painel.update-qrcode') }}">
                        @csrf

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