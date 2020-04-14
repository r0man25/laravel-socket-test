@php
    /** @var array $url_data */
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{!! asset('css/app.css')!!}" rel="stylesheet">
        <script src="{!! asset('js/app.js')!!}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content col-10">
                <div id="app">

                    <div class="title m-b-md">
                        Laravel 7.0
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Example component</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vue -> Blade</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Vue -> Blade (Ajax)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="chart-line-tab" data-toggle="tab" href="#chart-line" role="tab" aria-controls="chart-line" aria-selected="false">Line Chart basic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pie-line-tab" data-toggle="tab" href="#chart-pie" role="tab" aria-controls="chart-pie" aria-selected="false">Pie Chart basic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="chart-line-random-tab" data-toggle="tab" href="#chart-line-random" role="tab" aria-controls="chart-line-random" aria-selected="false">Line Random Chart basic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="chart-line-socket-tab" data-toggle="tab" href="#chart-line-socket" role="tab" aria-controls="chart-line-socket" aria-selected="false">Line SOCKET Chart basic</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-center">Example component</h2>
                                    <example-component></example-component>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-center">Send data from BLADE to Vue</h2>
                                    <prop-component :url-data="{{ json_encode($url_data) }}"></prop-component>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <ajax-component></ajax-component>
                        </div>
                        <div class="tab-pane fade" id="chart-line" role="tabpanel" aria-labelledby="chart-line-tab">
                            <line-chart-component></line-chart-component>
                        </div>
                        <div class="tab-pane fade" id="chart-pie" role="tabpanel" aria-labelledby="chart-pie-tab">
                            <pie-chart-component></pie-chart-component>
                        </div>
                        <div class="tab-pane fade" id="chart-line-random" role="tabpanel" aria-labelledby="chart-line-random-tab">
                            <line-random-chart-component></line-random-chart-component>
                        </div>
                        <div class="tab-pane fade" id="chart-line-socket" role="tabpanel" aria-labelledby="chart-line-socket-tab">
                            <line-socket-chart-component></line-socket-chart-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
