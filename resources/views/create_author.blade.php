<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aggiungi un Autore</title>
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
                <h2 class="mt-5 mb-4">Aggiungi un Autore</h2>
            </div>
            <div class="col-md-5">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                @endif
                    @if (session('success'))
                        <div style="color: green;">
                            <ul>
                                <li>{{ session('success') }}</li>
                            </ul>
                        </div>
                    @endif
                <form action="{{route('store.author')}}" method="post">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Umberto Eco">
                        <label for="name">Nome</label>
                    </div>
                    <div class="mb-3 form-floating birthday_width">
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Umberto Eco">
                        <label for="birthday">Data di Nascita (opzionale)</label>

                    </div>

                    <div class="pt-4 border-top">
                        <button type="submit" class="btn btn-primary me-3">Aggiungi l'Autore</button>
                        <a href="list_author.blade.php"
                            class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
