<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>

    <main class="bg-light">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Series</th>
            <th scope="col">Type</th>
            <th scope="col">Sale Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
            <tr>
              <th scope="row"><img src="https://picsum.photos/300/300"></th>
              <td > {{$comic->title}}</td>
              <td class="w-25"> {{$comic->description}}</td>
              <td > {{$comic->price}}</td>
              <td > {{$comic->series}}</td>
              <td > {{$comic->type}}</td>
              <td > {{$comic->sale_date}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </main>

</body>

</html>