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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="min-vh-100 py-5 d-flex flex-column justify-content-center">

                        <h1 class="display-5 fw-bold">
                            Go to Comics :P !
                        </h1>
                        <a onclick="window.location='{{ url("comics") }}'" class="btn btn-primary btn-lg mt-5" type="button">Go!</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>

</html>