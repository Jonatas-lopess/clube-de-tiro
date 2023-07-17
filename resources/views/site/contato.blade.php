@extends('templates.site')
@section('content')
<section>
    <article>
        <div class="d-flex flex-column">
            <span>Email: <a href="mailto:{{$email}}?subject=Ol%C3%A1!!">{{$email}}</a></span>
            <span>Whatsapp: <a href="https://api.whatsapp.com/send?phone=55{{$number}}&text=Ol%C3%A1!!">{{$number}}</a></span>
            <img src="{{asset('images/'.$qrcode)}}" alt="Fale conosco pelo Whatsapp" id="qrcode">
            <small>Use um leitor de QRCodes e mande-nos uma mensagem pelo whatsapp!</small>
        </div>
    </article>
</section>
@endsection