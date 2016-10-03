@extends('layouts.app')

@section('content')
    <section class="m-t-2">
        <div class="container">
            <div class="panel panel-custom col-xs-12">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-lg-offset-3 underlined">
                            <h2 class="text-center center-block">
                                Dina jobbannonser
                                @if(count(($user->jobs)) != 0)
                                    ( {{ count($user->jobs) }} )
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="text-center center-block text-secondary">
                                ({{ $user->email }})
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    {{--<h4>Visar annonser {{ ($allJobs->currentPage() * $allJobs->perPage()) - ($allJobs->perPage() - 1) . " - " . $allJobs->currentPage() * $allJobs->perPage() . " av " . $allJobs->total()) }}</h4>--}}
{{--                    {{ dd("Visar annonser " . ($allJobs->currentPage() * $allJobs->perPage()) - ($allJobs->perPage() + 1) . " - " . $allJobs->currentPage() * $allJobs->perPage() . " av " . $allJobs->total()) }}--}}
{{--                    {{ dd(($allJobs->currentPage() * $allJobs->perPage()) - ($allJobs->perPage() - 1) . " - " . $allJobs->currentPage() * $allJobs->perPage() . " av " . $allJobs->total()) }}--}}
{{--                    {{ dd($allJobs->currentPage()) }}--}}
                    @if($allJobs)
                        @foreach($allJobs as $job)
                            @include('pages.partials.custom-job-puff')
                        @endforeach
                    <div class="row">
                        <div class="col-xs-12">
                            {{ $allJobs->links() }}
                        </div>
                    </div>
                    @else
                        <div class="well well-custom">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Du har tyvärr inga jobbannonser.</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($user->role === 3)
                        <div class="col-md-4 col-md-offset-4">
                            <a href="{{ action('CompanyController@show') }}">
                                <button class="btn btn-secondary btn-lg btn-round col-xs-12">
                                    Skapa en annons
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>









            <div class="row">
                {{--@if($user->logo_path)--}}
                {{--<div class="col-md-12">--}}
                {{--<img class="logo" src="{{ env('UPLOADS_URL') }}/{{ $user->logo_path }}" alt="">--}}
                {{--</div>--}}
                {{--@endif--}}
                <div class="col-md-12 newJobContainer">
                    <div class="messageBoxHeading">Dina jobbannonser
                        @if(count(($user->jobs)) != 0)
                            ( {{ count($user->jobs) }} )
                        @endif
                        <div class="loggedInUser"><span class="orange">(</span> {{ $user->email }} <span class="orange">)</span></div>
                    </div>
                    <div class="panel-body">
                        @if($user->jobs)
                            @foreach($user->jobs as $job)
                                @include('pages.partials.custom-job-puff')
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Du har tyvärr inga jobbannonser.</h3>
                                </div>
                            </div>
                        @endif
                        @if($user->role === 3)
                            <div class="col-md-4 col-md-offset-4">
                                <a href="{{ action('CompanyController@show') }}">
                                    <button class="registerFormSubmitButton col-md-12">
                                        Skapa en annons
                                    </button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
