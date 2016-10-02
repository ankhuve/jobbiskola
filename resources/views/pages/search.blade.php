@extends('layouts.app')
@section('content')
    <section class="search-field white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-2">
                    <h1>Hitta jobb</h1>
                </div>
                <div class="col-xs-12 col-md-9 col-lg-10">
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
                                </div>
                                <div class="input-label--subtitle">(jobbtitel, nyckelord, företag)</div>
                            </div>
                            {{--Slut sökfält--}}

                            {{--<div class="col-md-6">--}}
                            {{--<div class="input-group input-group-full">--}}
                            {{--<label class="sr-only" for="keyword">Sökord</label>--}}
                            {{--{!! Form::text('q', '', array('class'=>'form-control form-input', 'placeholder'=>'Specialpedagog, rektor, idrottslärare..',--}}
                            {{--'autofocus'=>'autofocus', 'id' => 'keyword')) !!}--}}

                            {{--<label class="sr-only" for="submit">Skicka sökning</label>--}}
                            {{--<span class="input-group-btn">--}}
                            {{--{!! Form::submit('Sök', array('class'=>'form-input form-input--btn btn btn-primary', 'onsubmit' =>--}}
                            {{--'setSearchParameters()', 'id' => 'submit')) !!}--}}
                            {{--</span>--}}
                            {{--</div>--}}
                            {{--<div class="input-label--subtitle">(jobbtitel, nyckelord, företag)</div>--}}
                            {{--</div>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="search-results">
        {{--{{ dd($searchOptions[0]->soklista) }}--}}

        <aside class="filters">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">

                        <h4>Förfina sökning</h4>

                        <div class="row">
                            <div class="col-sm-12 col-xs-6">
                                <div class="input-group input-group-full">
                                    <label class="sr-only" for="county">Län</label>
                                    <select name="lan" class="form-input" id="county" style="display: block;">
                                        <option class="defaultOption" value="" selected>Alla län</option>
                                        <option value="norge" label="Norge" name="Norge">Norge</option>
                                        <option disabled>------</option>
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
                            <div class="col-sm-12 col-xs-6">
                                @if (isset($searchOptions[0]))
                                    <div class="input-group input-group-full">
                                        <label class="sr-only" for="job-group">Yrkesgrupp</label>
                                        <select name="{{ $searchOptions[0]->soklista->listnamn }}" class="form-input" id="job-group">
                                            <option class="defaultOption" value="" selected>Alla yrkesgrupper</option>

                                            @foreach($searchOptions[0]->soklista->sokdata as $option)
                                                <option value={{ $option->id }} label='{{ $option->namn }}'
                                                        name='{{ $option->namn }}'>{{ $option->namn }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="input-group input-group-full">
                                    <label class="sr-only" for="submit">Filtrera sökning</label>
                                    {!! Form::submit('Filtrera', array('class'=>'form-input form-input--btn btn btn-primary', 'onsubmit' =>
                                    'setSearchParameters()', 'id' => 'submit')) !!}
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="input-group input-group-full">
                                    <label class="sr-only" for="submit">*</label>
                                    <button class="form-input form-input--btn btn btn-danger" id="reset" type="button"><span class="glyphicon glyphicon-repeat"></span></button>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </aside>

        <div class="results">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        @include('pages.partials.searchresults')
                    </div>
                </div>
            </div>
        </div>

    </section>


    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.1/vue.js"></script>--}}
    {{--<script src="/js/jquery.js"></script>--}}
    {{--<script src="/js/search.js"></script>--}}

@endsection