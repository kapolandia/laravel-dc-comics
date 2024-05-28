<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comics</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body class="bg-light">

    <main >
        <div class="container mt-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('comics.update', ['comic' => $comic->id])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group col-md-6 mt-4">
                    <label for="thumb">Comic Thumb</label>
                    <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Insert the comic image" value={{ $comic->thumb }}>
                </div>
                <div class="form-group col-md-6 mt-4">
                    <label for="title">Comic Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Insert the title" value={{ $comic->title }}>
                </div>
                <div class="form-group col-md-6 mt-4">
                    <label for="description">Comic Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Insert the description">{{ $comic->description }}</textarea>
                </div>
                <div class="form-group mt-4">
                    <label for="price">Comic Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Insert the price" value={{ $comic->price }}>
                </div>
                <div class="form-group mt-4">
                    <label for="series">Series</label>
                    <input type="text" class="form-control" id="series" name="series" placeholder="Insert the series" value={{ $comic->series }}>
                </div>
                <div class="form-group mt-4">
                    <label for="type">Category</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Insert the category" value={{ $comic->type }}>
                </div>
                <div class="form-group mt-4">
                    <label for="date" class="form-label">Data</label>
                    <input type="date" class="form-control" id="date" name="sale_date" value={{ $comic->sale_date }}>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </form>
        </div>

    </main>

</body>

</html>