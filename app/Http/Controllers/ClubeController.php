<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use App\Services\MailService;

class ClubeController extends Controller
{
    private $mail;

    public function __construct()
    {
        $this->mail = new MailService;
        $this->number = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'number']])->first();
    }

    public function homeAction()
    {
        $imagems = SiteContent::where('page','home')->pluck('content');

        return view('site.home', [
            'title' => "Home",
            'back_img' => asset('images/fundo/fundo_home2.jpeg'),
            'sidebar' => true,
            'h1' => 'Clube de Tiro',
            'small' => 'Centro de Treinamento Tático',
            'imagens' => $imagems,
            'number' => $this->number->content,
        ]);
    }

    public function contatoAction()
    {
        $email = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'email']])->first();
        $qrcode = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'image']])->first();

        return view('site.contato', [
            'title' => "Contato",
            'back_img' => asset('images/fundo/fundo_contato.jpg'),
            'sidebar' => true,
            'h1' => 'Fale Conosco',
            'small' => false,
            'number' => $this->number->content,
            'email' => $email->content,
            'qrcode' => $qrcode->content
        ]);
    }
    
    public function sobreAction()
    {
        $text = SiteContent::where('page', 'about')->first();

        return view('site.sobre', [
            'title' => "Sobre",
            'back_img' => asset('images/fundo/fundo_sobre.jpg'),
            'sidebar' => true,
            'h1' => 'Sobre Nós',
            'small' => false,
            'number' => $this->number->content,
            'text' => $text->content
        ]);
    }

    public function servicosAction()
    {
        $services = Service::all()->toArray();

        return view('site.servicos', [
            'title' => "Serviços",
            'back_img' => asset('images/fundo/fundo_home.jpg'),
            'sidebar' => true,
            'h1' => 'O que temos a oferecer',
            'small' => false,
            'number' => $this->number->content,
            'services' => $services
        ]);
    }

    public function formularioAction()
    {
        return view('site.formulario', [
            'title' => "Formulário",
            'back_img' => '',
            'sidebar' => false,
            'h1' => false,
            'number' => $this->number->content,
            'small' => false,
        ]);
    }

    public function salvar(Request $data)
    {
        try {
            echo json_encode([
                'message' => $this->mail->enviaEmail($data->toArray())
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'message' => 'Envio do formulário falhou... Tente novamente mais tarde ou entre em contato conosco!',
                'message_raw' => $e->getMessage()
            ]);
        }
    }
};
