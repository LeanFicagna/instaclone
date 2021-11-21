<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href=" {{ URL::to('css/main.css') }} ">


    <title>@yield('title')</title>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="{{ URL::to('js/app.js') }}"></script>

    <div class="modal fade align-center" id="open-img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin: auto auto">
        <div class="modal-dialog" method="POST" action="{{ route('publication') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="row modal-body">
                    <button class="btn border col-1 prev"><</button>
                    <div class=" col show-img" style="width: 1000px; height: 650px"></div>
                    <button class="btn border col col-1 next">></button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
