<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" minimal-ui>

    <meta name="description" content="Jobbiskola.se | Lediga jobb inom skola" />
    <meta name="keywords" content="Lediga jobb, jobb, skola, extrajobb, deltidsjobb, heltid, jobba extra" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jobbiskola') }}</title>

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
                    {{ config('app.name', 'Jobbiskola') }}
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
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
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
                                        Logout
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
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="alert alert-custom alert-top">
                    <p>
                        <strong>Ajdå!</strong>
                        Just nu verkar vi har lite problem med vår sökfunktion. Prova igen om ett litet tag!
                    </p>
                    <div class="hidden">
                        <ul>
                            @foreach($afApiError as $key => $value)
                                <li>{{ $key }} : {{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
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
