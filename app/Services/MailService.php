<?php

namespace App\Services;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function enviaEmail(Array $data)
    {
        $content = file_get_contents(url("src/templates/view/MailContent.html"));
        foreach ($data as $key => $value) {
            $content = str_replace('_'.$key, $value, $content);
        }

        try {
            //Server settings
            $this->mail->isSMTP();
            $this->mail->Host       = 'mail.clubedetiro76.com.br';
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = 'no-reply@clubedetiro76.com.br';
            $this->mail->Password   = 'Noreply@clubedetiro76';
            $this->mail->SMTPSecure = 'ssl';
            $this->mail->Port       = 465;
    
            //Recipients
            $this->mail->setFrom('no-reply@clubedetiro76.com.br');
            $this->mail->addAddress('contato@clubedetiro76.com.br');
    
            // Content
            $this->mail->isHTML(true);
            $this->mail->CharSet  = 'UTF-8';
            $this->mail->Subject = 'Inscrição de ' . $data['nome'];
            $this->mail->Body = $content;
            $this->mail->AltBody = 
            "Nome: " . $data['nome'] .
            "\nEmail: " . $data['email'] .
            "\nCPF: " . $data['cpf'] .
            "\nTelefone: " . $data['tel'] .
            "\nRG: " . $data['rg'] .
            "\nCEP: " . $data['cep'];
    
            $this->mail->send();
            return 'A Inscrição foi enviada com sucesso. Aguarde nosso retorno!';
        } catch (Exception $e) {
            throw new \Exception("Mensagem não pode ser enviada. Mailer Error: {$this->mail->ErrorInfo}");
        }
    }
}