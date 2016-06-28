@foreach($anuncios as $anuncio)

<div class="card share  col1" data-social="item">
    <div class="circle" data-toggle="tooltip" title="Label" data-container="body">
    </div>
    <div class="card-header clearfix">
        <div class="user-pic">
            <i class="fa fa-paste" style="font-size: 15px;"></i>
        </div>
        <h5>{{ $anuncio->nombre }}</h5>
        <h6>{{ $anuncio->fecha }}</h6>
    </div>

    <div class="card-description">
        @if (empty($anuncio->img_banner))

        @else
            <img src="{{ asset('uploads/anuncios/'.$anuncio->img_banner) }}" />
        @endif

        <p>{{ mb_substr($anuncio->descripcion, 0, 250) }} ...</p>

        <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-20 anuncio-btn" data-value="{{ Crypt::encrypt($anuncio->id) }}">Ver mas</button>

    </div>
</div>

@endforeach