<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- BOOTSTRAP - (LIB CSS) --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
        {{-- FONTWASOME - (ICONS) --}}
        <script src="https://kit.fontawesome.com/c3cffe3b5e.js" crossorigin="anonymous" defer></script>
        <title>.:News~App:.</title>
    </head>
    <body>
        <div class="container">
            <div class="d-flex align-items-center gap-3">
                <h1>News workspace</h1>
                <a class="btn btn-primary rounded-pill btn-sm" href="{{ route('index') }}">Chamar 'index' na api</a>
            </div>
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th scope="col">Tipo Notícia</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $new)
                        @if (!$new)
                            <tr colspan="3">    
                                <td>Nenhuma notícia registrada.</td>
                            </tr>
                        @endif

                        <tr>
                            <td> {{ $new->id_type_news == 1? $new->id_type_news = 'Urgente': $new->id_type_news = 'Diária' }}</td>
                            <td> {{ $new->title }}</td>
                            <td> {{ $new->desc_news }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row py-3">
                <h1>Todas as notícias:</h1>
                @foreach ($news as $new)
                    @if (!$new)
                        <div class="col-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card de apresentação da notícia</h5>
                                    <p class="card-text">Resumo da Noticia</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-3 py-2">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <p class="card-text">{{ $new->id_type_news }}</p>
                                <h5 class="card-title">{{ $new->title }}</h5>
                                <p class="card-text">{{ $new->desc_news }}</p>
                                <a href="{{ route('show', ['id' => $new->id]) }}" class="btn btn-outline-primary btn-sm mt-auto rounded-pill">Show return api...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
