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
                                {{ $jobMatch->title }}
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
                                    {{ $jobMatch->work_place }}
                                </i>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="well well-custom">
                        @if($jobMatch->user->logo_path)
                            <div class="row">
                                <div class="logo col-xs-12" >
                                    <div class="logo logo-img logo-job" style="background-image: url('{{ env("UPLOADS_URL") }}/{{ $jobMatch->user->logo_path }}')"></div>
                                </div>
                            </div>
                        @endif

                        <p style="white-space: pre-line">
                            {!! $jobMatch->description !!}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="panel-footer">
                        <p> Kommun:  {{ $jobMatch->municipality }}</p>
                        <p> Publicerad: {{ date('d-m-Y', strtotime($jobMatch->published_at)) }}</p>
                        <p> Dagar sedan publicering: {{ $daysSincePublished }}</p>
                        @if(isset($jobMatch->latest_application_date))
                            <hr>
                            <p>Sista ansökningsdag {{ $jobMatch->latest_application_date }}</p>
                        @endif
                        <div class="row">
                            @if(empty($jobMatch->external_link))
                                @include('pages.partials.applicationform')
                            @endif
                            <div class="col-sm-4 col-sm-offset-4">
                                @if(empty($jobMatch->external_link))
                                    <button class="btn btn-lg btn-secondary btn-round center-block" @click="toggleApplicationForm" v-show="!applicationFormShowing">Ansök</button>
                                @else
                                    <a target="_blank" href="{{ $jobMatch->external_link }}">
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