@extends('templates.auth')

@section('content')
  <aside class="main-sidebar" style="background-color: #222d32;">
    <section class="sidebar">

      <div class="sidebar-form">
        <div class="input-group">
          <input type="search" name="q" class="form-control" placeholder="Procurar..." autocomplete="off">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat" style="color: #999;"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </div>

      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">SEÇÕES</li>
        @if (auth()->user()->role == 'admin')
          <li id="user_section_link" @if ($page == 'users') class="active" @endif><a href="{{ route('painel.usuarios') }}"><i class="fa fa-user"></i> <span>Usúarios</span></a></li>      
        @endif
        <li><a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-list"></i><span class="pl-2">Páginas</span></a></li>
        <div class="collapse show" id="pageSubmenu">
          <ul class="list-unstyled">
            <li id="home_section_link" @if ($page == 'home') class="active" @endif>
              <a href="{{ route('painel.home') }}"><i class="fa fa-link"></i><span class="pl-2">Home</span></a>
            </li>
            <li id="about_us_section_link" @if ($page == 'about') class="active" @endif>
              <a href="{{ route('painel.about-us') }}"><i class="fa fa-link"></i><span class="pl-2">Sobre Nós</span></a>
            </li>
            <li id="contact_section_link" @if ($page == 'contact') class="active" @endif>
              <a href="{{ route('painel.contact') }}"><i class="fa fa-link"></i><span class="pl-2">Contato</span></a>
            </li>
            <li id="services_section_link" @if ($page == 'service') class="active" @endif>
              <a href="{{ route('painel.service') }}"><i class="fa fa-link"></i><span class="pl-2">Serviços</span></a>
            </li>
          </ul>
        </div>
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    @yield('subcontent')
  </div>

  <!-- footer -->
  <footer class="main-footer">
    <span style="font-size: small;">Todos os direitos reservados © 2020.</span>
  </footer>
@endsection
