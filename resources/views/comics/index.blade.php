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

<body class="m-0 p-0">

    <main class="bg-light">
      {{-- MODAL --}}
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete element</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="delete-title">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="confirmation-delete">Delete</button>
            </div>
          </div>
        </div>
      </div>
      {{-- END MODAL --}}
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
            <th></th>
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
              <td>
                <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                  <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" id="delete_button" data-item-title="{{$comic->title}}">
                    @csrf
                    @method('DELETE')
                    Delete
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </main>

</body>

</html>