@extends('layouts.app')

@section('content')
    <section class="m-t-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                Registrera användare
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Namn</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control bordered" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Mailadress</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control bordered" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Lösenord</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control bordered" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Upprepa lösenord</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control bordered" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">
                                    {!! Form::label('cv', 'CV (.doc, .docx, .pdf, .rtf, .txt, max 3MB)', ['class' => 'control-label col-md-4']) !!}

                                    <div class="col-md-6">
                                        {!! Form::file('cv', array('class'=>'form-control bordered')) !!}
                                    </div>
                                    @if ($errors->has('cv'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cv') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-secondary">
                                            Registrera
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
