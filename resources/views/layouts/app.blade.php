<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" minimal-ui>

    <meta name="description" content="@yield('meta-description', 'Jobbiskola.se | Lediga jobb inom skola')" />
    <meta name="keywords" content="Lediga jobb, jobb, skola, extrajobb, deltidsjobb, heltid, jobba extra" />

    <meta property="og:title" content="@yield('og-title', 'Jobbiskola.se | Lediga jobb inom skola')" />
    <meta property="og:description" content="@yield('og-description', 'Här kan du söka bland tusentals jobb! Oavsett om du är nyutexaminerad eller helt enkelt vill vidare i karriären kan vi hjälpa dig att hitta rätt. Vi jobbar rikstäckande och hjälper allt i från enskilda firmor till stora koncerner, kommuner och myndigheter med att hitta rätt personal. ')" />
    {{--Använd om man vill ha företagets logga för annons (kan bli konstiga proportioner)--}}
    {{--    <meta property="og:image" content="@yield('og-image', asset('img/jobbiskola_og.png'))" />--}}
    <meta property="og:image" content={{ asset('img/jobbiskola_og.png') }} />
    <meta property="og:url" content={{ URL::current() }} />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Jobbiskola'))</title>

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="{{ config('app.name', 'Jobbiskola') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />


    <!-- Styles -->
    <link href="{{ elixir('/css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<nav class="navbar navbar-custom navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img alt="{{ config('app.name', 'Jobbiskola') }}" src="{{ asset("img/jobbiskola_logo.png") }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::action('SearchController@index') }}">
                        Leta jobb
                    </a>
                </li>
                <li>
                    <a href="{{ URL::action('CompanyController@index') }}">
                        Hitta arbetskraft
                    </a>
                </li>
                <li>
                    <a href="{{ URL::action('FeaturedController@index') }}">
                        Attraktiva arbetsgivare
                    </a>
                </li>
                <li class="visible-xs">
                    <a href="{{ URL::action('AboutController@index') }}">
                        Om oss
                    </a>
                </li>
                <li class="visible-xs">
                    <a href="{{ URL::action('ContactController@create') }}">Kontakt</a>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Om oss <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ URL::action('AboutController@index') }}">
                                Om oss
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::action('ContactController@create') }}">Kontakt</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    {{--<li><a href="{{ url('/login') }}">Logga in</a></li>--}}
                    <li><a href="{{ url('/register') }}">Registrera</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logga ut
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if (isset($afApiError))
    <div class="alert alert-custom alert-top">
        <p>
            <strong>Ajdå!</strong>
            Just nu verkar vi ha lite problem med vår sökfunktion. Prova igen om ett litet tag!
        </p>
        <div class="hidden">
            <ul>
                @foreach($afApiError as $key => $value)
                    <li>{{ $key }} : {{ $value }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(Session::has('message'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12 m-t-2">
            <div class="alert alert-success">
                {!! Session::get('message') !!}
            </div>
        </div>
    </div>
@endif

@yield('content')

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.min.js"></script>
<script src="{{ asset('js/summernote/lang/summernote-sv-SE.js') }}"></script>


</body>
</html>
