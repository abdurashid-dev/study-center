<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Study CRM</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('custom.min.css')}}">
</head>
<body>
<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <header class="masthead text-center mb-2 ">
                <div class="inner">
                    <h3 class="masthead-brand">
                        <b>
                            <a href="/">
                            <span class="text-primary">
{{--                                    <img class="mr-2" height="20px" width="20px" src="{{asset('logo.png')}}" alt="Logo">--}}
                                    study</span> crm
                            </a>
                        </b>
                    </h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link @if(request()->routeIs('welcome')) active @endif" href="/">Izlash</a>
                        <a class="nav-link " href="/stats">Info</a>
                        <a class="nav-link " href="/login">Kirish</a>
                    </nav>
                </div>
            </header>
        </div>
    </div>
    @yield('content')
    <footer class="mastfoot mt-auto text-center">
        <p><small>All rights reserved by <a href="https://t.me/abdurashid_coder">Abdurashid</a></small></p>
    </footer>
</div>

<!-- Page related js files -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!-- Page related js codes -->
</body>
</html>

