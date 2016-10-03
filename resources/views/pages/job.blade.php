@extends('layouts.app')

@section('content')

    <section class="m-t-2">
        <div class="container">

            @if(Session::has('contactError'))
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="alert alert-custom">
                            {!! Session::get('contactError') !!}
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('message'))
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="alert alert-success">
                            {!! Session::get('message') !!}
                        </div>
                    </div>
                </div>
            @endif

            <div class="panel panel-custom col-lg-10 col-lg-offset-1">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="text-center center-block">
                                {{ $jobMatch->annons->annonsrubrik }}
                            </h1>
                            <a href="{{ URL::previous() }}">
                                <button class="panel-heading-btn btn btn-danger left">
                                    <span class="glyphicon glyphicon-triangle-left"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="text-center center-block text-secondary">
                                <i>
                                    @if(property_exists($jobMatch->arbetsplats, 'hemsida'))
                                        <a href={{ $jobMatch->arbetsplats->hemsida }}>
                                            {{ $jobMatch->arbetsplats->arbetsplatsnamn }}
                                        </a>
                                    @else
                                        {{ $jobMatch->arbetsplats->arbetsplatsnamn }}
                                    @endif
                                </i>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="well well-custom">
                        <p style="white-space: pre-line">
                            {{ $jobMatch->annons->annonstext }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="panel-footer">
                        <p> Varaktighet:  {{ $jobMatch->villkor->varaktighet }}</p>
                        <p> Kommun:  {{ $jobMatch->annons->kommunnamn }}</p>
                        <p> Publicerad: {{ date('d-m-Y', strtotime($jobMatch->annons->publiceraddatum)) }}</p>
                        <p> Dagar sedan publicering: {{ $daysSincePublished }}</p>
                        @if(isset($jobMatch->ansokan->sista_ansokningsdag))
                            <hr>
                            <p>Sista ansökningsdag {{ substr($jobMatch->ansokan->sista_ansokningsdag, 0, 10) }}</p>
                        @endif
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                @if(isset($jobMatch->annons->platsannonsUrl))
                                    <a target="_blank" href="{{ $jobMatch->annons->platsannonsUrl }}">
                                        <button class="btn btn-lg btn-secondary btn-round center-block">Ansök</button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection