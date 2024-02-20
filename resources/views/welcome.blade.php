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
            <h1>Hellow world</h1>
            <a class="btn btn-primary rounded-pill" href="{{ route('news') }}"><i class="fa-solid fa-newspaper me-2"></i>News</a>
            <input type="text" class="form-control form-control-sm" placeholder="pesquisar:." name="search">
            <a class="btn btn-primary rounded-pill" href="{{ route('news.show') }}"><i class="fa-solid fa-newspaper me-2"></i>buscar id 1</a>
        </div>
    </body>
</html>
