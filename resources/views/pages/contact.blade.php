@extends('layouts.app')

@section('scripts')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
    <section class="m-t-2">
        <div class="container">
            @if(!is_null($content))
                @foreach($content as $block)
                    <div class="panel panel-custom col-lg-10 col-lg-offset-1">
                        <div class="panel-heading">
                            <h2>
                                {{ $block->title }}
                            </h2>
                        </div>

                        <div class="panel-body">
                            <div class="well well-custom">
                                <p style="white-space: pre-line">
                                    {{ $block->content }}
                                </p>
                            </div>

                            {!! Form::open(['method' => 'POST', 'action' => 'ContactController@store', 'class' => 'form']) !!}

                            <div class="form-group">
                                {!! Form::label('Namn') !!}
                                {!! Form::text('name', Auth::user() ? Auth::user()->name : '', array('required', 'class'=>'form-control bordered', 'placeholder'=>'Förnamn Efternamn')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('E-mailadress') !!}
                                {!! Form::text('email', Auth::user() ? Auth::user()->email : '', array('required', 'class'=>'form-control bordered', 'placeholder'=>'din@email.se')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Meddelande') !!}
                                {!! Form::textarea('message', null, array('required', 'class'=>'form-control bordered', 'placeholder'=>'Vad funderar du på?')) !!}
                            </div>

                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                            </div>

                            @if(!empty($errors->all()))
                                <div class="alert alert-custom">
                                    <ul>

                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                {!! Form::submit('Skicka!', array('class'=>'btn btn-primary')) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </section>
@endsection