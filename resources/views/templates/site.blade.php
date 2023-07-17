<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title>{{$title}}</title>

    <link rel="icon" type="imagem/png" href="{{asset('images/logo_redonda.png')}}" />
    <link rel="stylesheet" href="{{asset('bootstrap-4.5.3-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-free-5.15.1-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <header style="background-image:url({{$back_img}})">
            @if ($h1)
            <section id="titulo">

                    @if ($sidebar)
                    <input type="checkbox" id="control-nav" hidden/>
                    <label for="control-nav" class="control-nav"></label>
                    <label for="control-nav" class="control-nav-close"></label>

                    <nav class="navbar-dark">
                        <img src="{{asset('images/logo_redonda.png')}}" id="img-resp" alt="logo" width="150" height="150" hidden>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('sobre')}}">Sobre</a></li>
                        <img src="{{asset('images/logo_redonda.png')}}" alt="logo" width="160" height="160">
                        <li><a href="{{route('servicos')}}">Serviços</a></li>
                        <li><a href="{{route('contato')}}">Contato</a></li>
                    </nav>
                    @endif
                    <div>
                        <h1>{{$h1}}</h1>
                        @if ($small)
                            <small>{{$small}}</small>
                        @endif
                    </div>
                
            </section>
            @endif
    </header>
    <main>
    @yield('content')
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <p><b>Mapa do Site</b></p>
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('sobre')}}">Sobre</a></li>
                        <li><a href="{{route('servicos')}}">Serviços</a></li>
                        <li><a href="{{route('contato')}}">Contato</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <p><b>Localização</b></p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29498.33718025641!2d-44.431769909332374!3d-22.45565325264506!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9e7de63963d50d%3A0xdda1f86319a75bff!2sAv.%20J%C3%A9fferson%20Geraldo%20Bruno%2C%20500%20-%20Para%C3%ADso%2C%20Resende%20-%20RJ%2C%2027536-015!5e0!3m2!1spt-BR!2sbr!4v1605049823565!5m2!1spt-BR!2sbr" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <i class="fas fa-map-marked-alt" style="font-size: 1rem;"></i> <span style="font-size: 0.8rem;"> Local em construção...</span>
                </div>
                <div class="col-sm-4">
                    <p><b>Redes Sociais</b></p>
                    <a href="https://www.instagram.com/clubedetiro76/?hl=pt-br" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=55{{$number}}&text=Ol%C3%A1!!" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>

        <p class="cp">Todos os direitos reservados à <b>clubedetiro76.com.br</b> &copy; 2020</p>
    </footer>

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('bootstrap-4.5.3-dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootbox.all.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"
            integrity="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4="
            crossorigin="anonymous"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>