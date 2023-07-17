@extends('templates.site')
@section('content')
<section>
    <article>
        <hr>
        <h3>
            Nossos Serviços
        </h3>

        <div class="card m-auto">
            <div class="card-body">
                @foreach ($services as $service)
                    <h5 class="card-title">{{$service['name']}}</h5>
                    @if (!empty($service['description']))
                        <p class="card-title">{!! nl2br($service['description']) !!}</p>
                    @endif
                @endforeach
            </div>
        </div>
    </article>
</section>
@endsection