@extends('templates.site')
@section('content')
<div class="bg-color">
    <img src="{{asset('images/logo_redonda.png')}}" alt="logo" width="120" heigth="120">

    <div class="bg-form">
        <form id="formulario">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu Nome" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu E-mail" required>
                </div>
            </div>

            <div class="form-group d-flex flex-row">
                <div class="col-sm-6">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
                </div>
                <div class="col-sm-4">
                    <label for="tel">Telefone:</label>
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Digite seu Número" required>
                </div>
            </div>

            <div class="form-group d-flex flex-row">
                <div class="col-sm-6">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite seu RG" required>
                </div>
                <div class="col-sm-4">
                    <label for="orgao">Orgão Emissor:</label>
                    <input type="text" class="form-control" id="orgao" name="orgao" placeholder="Digite o Orgão Emissor" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite seu CEP" required>
                </div>
            </div>

            <div class="form-group d-flex flex-row">
                <div class="col-sm-4">
                    <label for="estado">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Digite seu Estado" required>
                </div>
                <div class="col-sm-8">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite sua Cidade" required>
                </div>
            </div>

            <div class="form-group d-flex flex-row">
                <div class="col-sm-4">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite seu Bairro" required>
                </div>
                <div class="col-sm-8">
                    <label for="rua">Rua:</label>
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite sua Rua" required>
                </div>
            </div>

            <div class="form-group d-flex flex-row">
                <div class="col-sm-4">
                    <label for="numero">Número:</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Número da Moradia" required>
                </div>
                <div class="col-sm-8">
                    <label for="complemento">Complemento:</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento (opcional)">
                </div>
            </div>

            <button class="btn btn-primary" id="btn-form">
                Confirmar
            </button>
        </form>
    </div>
</div>
<div class="bg-salmon">
    <p class="text-danger">Após confirmar, sua inscrição será analizada. Favor aguardar, entraremos em contato o mais breve possível.</p>
</div>
@endsection