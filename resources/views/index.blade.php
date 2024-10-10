<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I miei Libri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <main class="container">
        <section class="row">
            <div class="col-md-12 my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('books.index')}}" class="btn btn-secondary">Libri</a>
                    <a href="{{route('authors.index')}}" class="btn btn-secondary">Autori</a>
                    <a href="{{route('categories.index')}}" class="btn btn-secondary">Categorie</a>
                </div>
                <a href="{{route('create.book')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un
                    Libro</a>
                <h2 class="mt-5 mb-4">I miei Libri</h2>
            </div>
        </section>
        <section class="row">
            <div class="col-md-12">
                <div class="list-book">
                    @if ($errors->any())
                        <div style="color: red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div style="color: green;">
                            <ul>
                                <li>{{ session('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    @foreach($books as $book)
                        <article class="card border-0">
                            <div class="card-body">
                                <h3 class="card-title">{{$book['title']}}</h3>
                                <div>{{$authors[$book['id']]}}</div>
                                <div class="mt-2"><span class="badge text-bg-secondary">{{$categories[$book['id']]}}</span></div>
                                <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                                    <a href="{{route('show.book',$book['id'])}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                    <a href="{{route('edit.book',$book['id'])}}" class="btn btn-light"><i class="bi bi-pencil"></i></a>
                                    <form action="{{route('destroy.book',$book['id'])}}" method="post">
                                        @csrf
                                        <button type="submit" onclick="confirm('Sei Sicuro? Stai eliminando un Autore')" class="btn btn-light"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
    </main>

</body>

</html>
