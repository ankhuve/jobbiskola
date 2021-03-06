@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="container-fluid">
            <section class="search-field">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="row">
                            <div class="form-inline">
                                {!! Form::open(array('url' => action('SearchController@index'), 'method' => 'get')) !!}

                                {{--Sökfält--}}
                                <div class="col-md-12">
                                    <div class="input-group input-group-full">
                                        <label class="sr-only" for="keyword">Sökord</label>
                                        {!! Form::text('q', '', array('class'=>'form-control form-input', 'placeholder'=>'Specialpedagog, rektor..',
                                        'autofocus'=>'autofocus', 'id' => 'keyword')) !!}

                                        <label class="sr-only" for="submit">Skicka sökning</label>
                                        <span class="input-group-btn">
                                                    {!! Form::submit('Sök', array('class'=>'form-input form-input--btn btn btn-primary', 'onsubmit' =>
                                                    'setSearchParameters()', 'id' => 'submit')) !!}
                                                </span>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                {{--Slut sökfält--}}

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="col-xs-12 text-center">
                <job-counter></job-counter>
            </div>

            <div class="splash-box text-center center-block">
                <h1>Skolan behöver dig</h1>
            </div>
        </div>

        @if (!$profiledJobs->isEmpty())
            @include('pages.partials.profiled-jobs')
        @endif

    </section>

    <section class="register-blocks">
        <div class="container">
            <div class="row">
                @if(!is_null($content))
                    @foreach($content as $key => $block)
                        <div class="col-md-5 col-lg-4 {{ $key === 0 ? 'col-md-offset-1 col-lg-offset-2 m-b-2' : '' }}">
                            <div class="block block--register">
                                <h2><span class="underlined">{{ $block->title }}</span>?</h2>
                                <p style="white-space: pre-line">
                                    {{ $block->content }}
                                </p>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <a href="{{ $key === 0 ? URL::action('RegisterController@index') : URL::action('CompanyController@index')  }}"><button class="btn btn-primary btn-round btn-padded col-xs-10 col-xs-offset-1">Skapa din profil</button></a>
                                        <br/>
                                    </div>
                                    <div class="row m-t-1">
                                        <div class="col-xs-12 text-center">Redan medlem? <a class="loginLink" href="{{ route('login') }}">Logga in!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

@endsection
