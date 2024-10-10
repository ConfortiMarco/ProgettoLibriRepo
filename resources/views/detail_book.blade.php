<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Il nome della Rosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <main class="container">
        <section class="row mb-5">
            <div class="col-md-12 my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('books.index')}}" class="btn btn-secondary">Libri</a>
                    <a href="{{route('authors.index')}}" class="btn btn-secondary">Autori</a>
                    <a href="{{route('categories.index')}}" class="btn btn-secondary">Categorie</a>
                </div>
            </div>
        </section>
        <article class="detail-book row py-3 px-1 rounded-4">
            <div class="col-md-4">
                <figure>
                    @if($book['cover'] == '')
                        <img src="{{asset('images\\img\\no-cover.webp')}}" class="rounded" alt="Titolo Libro">
                    @else
                        <img src="{{asset('images\\img\\'.$book['cover'])}}" class="rounded" alt="Titolo Libro">
                    @endif
                </figure>
            </div>
            <div class="col-md-4">
                <h2 class="mb-3">{{$book['title']}}</h2>
                <div>
                    <p>{{$book['description']}}</p>
                </div>
                <div class="border-top mt-2 pt-3">
                    <span class="badge text-bg-secondary">{{$auth['name']}}</span>
                    <span class="badge text-bg-secondary">{{$cate['name']}}</span>
                    <span class="badge text-bg-secondary">{{$book['pages']}}</span>
                </div>
            </div>
        </article>

    </main>
</body>

</html>
