$(document).ready(function () {
    setTimeout(function () {
        script.iniciar();
    }, 100);
});

const script = {
    iniciarCampos: function () {
        var myself = this;

        myself.form = $("#formulario");
        myself.nome = $("#nome");
        myself.email = $("#email");
        myself.cpf = $("#cpf");
        myself.tel = $("#tel");
        myself.rg = $('#rg');
        myself.orgao = $("#orgao");
        myself.cep = $('#cep');
        myself.cidade = $("#cidade");
        myself.estado = $("#estado");
        myself.rua = $("#rua");
        myself.numero = $("#numero");
        myself.bairro = $("#bairro");
        myself.comp = $("#complemento");

        var maskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            }
        };
        
        $('#tel').mask(maskBehavior, options);
        $('#cpf').mask('000.000.000-00');
        $('#cep').mask('00000-000');
        $('#rg').mask('00.000.000-0');

        $("input").on('change invalid', function(e) {
            var field = e.currentTarget;
            
            field.setCustomValidity('');
            
            if (!field.validity.valid) {
              field.setCustomValidity('Preencha o campo corretamente.');  
            }
        });
    },

    preencherCEP: function () {
        var myself = this;

        function limpa_formulário_cep() {
            myself.cidade.val("");
            myself.estado.val("");
            myself.rua.val("");
            myself.bairro.val("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                myself.rua.val(conteudo.logradouro);
                myself.estado.val(conteudo.uf);
                myself.cidade.val(conteudo.localidade);
                myself.bairro.val(conteudo.bairro);
            }
            else {
                console.log("CEP não encontrado.");
        }
        }
            
        function pesquisacep(valor) {
            var cep = valor.replace(/\D/g, '');

            if (cep != "") {
                var validacep = /^[0-9]{8}$/;

                if(validacep.test(cep)) {
                    $.ajax({
                        url:  `https://viacep.com.br/ws/${cep}/json/`,
                        type: 'GET',
                        success: function (e) {
                            meu_callback(e)
                        },
                        error: function (e) {
                            console.log("Erro ao tentar consultar CEP.");
                        }
                    })
                }
                else {
                    console.log("Formato de CEP inválido.");
                }
            }
        };

        myself.cep.blur(function (e) {
            pesquisacep(myself.cep.val())
        })
    },

    salvar: function (){
        var myself = this;

        function isEmail(email){
            var er = new RegExp(/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/);

            if(email == '' || !er.test(email)){
                return true;
            }
            else {
                return false;
            }
        };

        myself.form.submit(function (e) {
            e.preventDefault();

            if (isEmail(myself.email.val())) {
                bootbox.hideAll();
                bootbox.alert("Digite um email válido!");
                return false;
            };

            $.ajax({
                url: APP_URL+"/formulario/salvar",
                type: "POST",
                dataType: 'JSON',
                data: {
                    'nome': myself.nome.val(),
                    'email': myself.email.val(),
                    'cpf': myself.cpf.val(),
                    'tel': myself.tel.val(),
                    'rg': myself.rg.val(),
                    'orgao': myself.orgao.val(),
                    'cep': myself.cep.val()      
                },
                success: function (response) {
                    console.log(response.message_raw);
                    bootbox.hideAll();
                    bootbox.alert(response.message, function(){
                        location.href = APP_URL
                    });
                },
                error: function (response) {
                    console.log(response);
                }
            });
        })
    },

    iniciar: function (){
        this.iniciarCampos();
        this.preencherCEP();
        this.salvar();
    }
}