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

                                <hr>

                                <h4 class="text-secondary">Jag är intresserad av jobb inom..</h4>

                                <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                    {!! Form::label('county', 'Län', ['class' => 'control-label col-md-4']) !!}
                                    <div class="col-md-6">
                                        <select name="lan" class="form-control bordered" id="county" style="display: block;">
                                            <option selected disabled>------</option>
                                            <option value="155" label="Norge" name="Norge">Norge</option>
                                            <option value="10" label="Blekinge län" name="Blekinge län">Blekinge län</option>
                                            <option value="20" label="Dalarnas län" name="Dalarnas län">Dalarnas län</option>
                                            <option value="9" label="Gotlands län" name="Gotlands län">Gotlands län</option>
                                            <option value="21" label="Gävleborgs län" name="Gävleborgs län">Gävleborgs län</option>
                                            <option value="13" label="Hallands län" name="Hallands län">Hallands län</option>
                                            <option value="23" label="Jämtlands län" name="Jämtlands län">Jämtlands län</option>
                                            <option value="6" label="Jönköpings län" name="Jönköpings län">Jönköpings län</option>
                                            <option value="8" label="Kalmar län" name="Kalmar län">Kalmar län</option>
                                            <option value="7" label="Kronobergs län" name="Kronobergs län">Kronobergs län</option>
                                            <option value="25" label="Norrbottens län" name="Norrbottens län">Norrbottens län</option>
                                            <option value="12" label="Skåne län" name="Skåne län">Skåne län</option>
                                            <option value="1" label="Stockholms län" name="Stockholms län">Stockholms län</option>
                                            <option value="4" label="Södermanlands län" name="Södermanlands län">Södermanlands län</option>
                                            <option value="3" label="Uppsala län" name="Uppsala län">Uppsala län</option>
                                            <option value="17" label="Värmlands län" name="Värmlands län">Värmlands län</option>
                                            <option value="24" label="Västerbottens län" name="Västerbottens län">Västerbottens län</option>
                                            <option value="22" label="Västernorrlands län" name="Västernorrlands län">Västernorrlands län</option>
                                            <option value="19" label="Västmanlands län" name="Västmanlands län">Västmanlands län</option>
                                            <option value="14" label="Västra Götalands län" name="Västra Götalands län">Västra Götalands län</option>
                                            <option value="18" label="Örebro län" name="Örebro län">Örebro län</option>
                                            <option value="5" label="Östergötlands län" name="Östergötlands län">Östergötlands län</option>
                                            <option value="90" label="Ospecificerad arbetsort" name="Ospecificerad arbetsort">Ospecificerad arbetsort</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                    {!! Form::label('category', 'Yrkesgrupp', ['class' => 'control-label col-md-4']) !!}

                                    <div class="col-md-8">
                                        <label class="sr-only" for="job-group">Yrkesgrupp</label>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2314" class="input--large">
                                                &nbsp;Doktorander
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5312" class="input--large">
                                                &nbsp;Elevassistenter m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2313" class="input--large">
                                                &nbsp;Forskarassistenter m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2342" class="input--large">
                                                &nbsp;Fritidspedagoger
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2343" class="input--large">
                                                &nbsp;Förskollärare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2341" class="input--large">
                                                &nbsp;Grundskollärare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2330" class="input--large">
                                                &nbsp;Gymnasielärare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3422" class="input--large">
                                                &nbsp;Idrottstränare och instruktörer m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2320" class="input--large">
                                                &nbsp;Lärare i yrkesämnen
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3421" class="input--large">
                                                &nbsp;Professionella idrottsutövare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2311" class="input--large">
                                                &nbsp;Professorer
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2351" class="input--large">
                                                &nbsp;Speciallärare och specialpedagoger m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2352" class="input--large">
                                                &nbsp;Studie- och yrkesvägledare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3441" class="input--large">
                                                &nbsp;Trafiklärare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2312" class="input--large">
                                                &nbsp;Universitets- och högskolelektorer
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2359" class="input--large">
                                                &nbsp;Övr. pedagoger med teoretisk specialistkompetens
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2319" class="input--large">
                                                &nbsp;Övriga universitets- och högskollärare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3449" class="input--large">
                                                &nbsp;Övriga utbildare och instruktörer
                                            </label>
                                        </div>
                                    </div>

                                    {{--Om vi vill hämta kategorierna direkt från AF--}}

                                    {{--@if (isset($searchOptions[0]))--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<label class="sr-only" for="job-group">Yrkesgrupp</label>--}}

                                            {{--@foreach($searchOptions[0]->soklista->sokdata as $option)--}}
                                                {{--<div class="checkbox">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" name="category[]" value="{{ $option->id }}" class="input--large">--}}
                                                        {{--&nbsp;{{ $option->namn }}--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--@endforeach--}}
                                        {{--</div>--}}
                                    {{--@endif--}}

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
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
