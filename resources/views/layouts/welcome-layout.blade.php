<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- SEO TOOLS --}}
    {!! SEO::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! JsonLd::generate() !!}
    <!-- Bootstrap core CSS -->
    <link rel="icon" type="image/x-icon" href="{{asset('logo.png')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/custom.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    @yield('styles')
    <style>
        body {
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            user-select: none;
        }

        .snow {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .snowflake {
            position: absolute;
        }

        .snowMan {
            position: absolute;
            top: 60%;
            left: 40%;
            font-size: 20rem;
        }
    </style>
</head>
<body>
<div class="snow">
    <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{route('welcome')}}">{{config('app.name')}}</a>
                    <button class="navbar-toggler" style="outline: none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars white" style="color: #cecaca"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('search*') || request()->routeIs('welcome')) active @endif"
                                   aria-current="page" href="{{route('welcome')}}">Izlash</a>
                            </li>
                            {{--                                                <li class="nav-item">--}}
                            {{--                                                    <a class="nav-link @if(request()->routeIs('info')) active @endif" href="{{route('info')}}">Info</a>--}}
                            {{--                                                </li>--}}
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('calendar.index')) active @endif"
                                   href="{{route('calendar.index')}}">Taqvim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('frontend.dtm')) active @endif"
                                   href="{{route("frontend.dtm")}}">DTM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Kirish</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        @yield('content')

        <footer class="mastfoot mt-auto text-center">
            <p><small>All rights reserved by <a href="https://t.me/abdurashid_coder">Abdurashid</a></small></p>
        </footer>
    </div>

</div>
<!-- Page related js files -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!-- Page related js codes -->
<script>
    $(document).ready(function () {
        $(document).on('keypress', function (e) {
            if (e.which === 47) {
                $('#search').focus();
            }
        });
    });

    function newElement(tagName, className) {
        const element = document.createElement(tagName);
        element.className = className;

        return element;

    }

    function Snowflake() {
        this.HTMLElement = newElement('span', 'snowflake');
        this.HTMLElement.innerHTML = '❄️';
        this.getY = () => parseFloat(this.HTMLElement.style.top.split('%')[0]);
        this.setY = y => this.HTMLElement.style.top = `${y}%`;
        this.setX = () => {
            const randomPosition = (100 - 0) * Math.random();
            this.HTMLElement.style.left = `${randomPosition}%`;
        }
        this.setSize = () => {
            const randomSize = (1 - 0.5) * Math.random() + 0.5;
            this.HTMLElement.style.fontSize = `${randomSize}rem`;
        }

        this.setY(-10);
        this.setX();
        this.setSize();
    }

    function Snow() {
        this.HTMLElement = document.querySelector('.snow');
        this.snowflakes = [];

        this.addSnowflakes = () => {

            if (this.snowflakes.length <= 1000) {
                const snowflake = new Snowflake();
                this.snowflakes.push(snowflake);
                this.HTMLElement.appendChild(snowflake.HTMLElement);
            }
        }

        this.animation = () => {
            this.snowflakes.forEach(snowflake => {
                const y = snowflake.getY();
                const newY = y >= 100 ? -10 : y + 0.5;
                snowflake.setY(newY);
            });
        }

    }

    const body = document.querySelector('body');

    const snow = new Snow();
    body.appendChild(snow.HTMLElement);

    setInterval(() => {
        snow.addSnowflakes();
    }, 1000);
    setInterval(() => {
        snow.animation();
    }, 40);
</script>
</body>
</html>

