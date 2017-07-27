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
                                    {!! Form::text('q', '', array('class'=>'form-control form-input', 'placeholder'=>'Specialpedagog, förskollärare..',
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="search-results">
        <div class="container-fluid">
            <aside class="filters">
                <div class="container-fluid">

                    <h4>Förfina sökning</h4>

                    <div class="input-group input-group-full">
                        <label class="sr-only" for="county">Län</label>
                        <select name="lan" class="form-input" id="county" style="display: block;">
                            <option value="" class="defaultOption" selected>Alla län</option>
                            <option {{ $request->get('lan') === "155" ? "selected" : "" }} value="155" label="Norge" name="Norge">Norge</option>
                            <option disabled>------</option>
                            <option {{ $request->get('lan') === "10" ? "selected" : "" }} value="10" label="Blekinge län" name="Blekinge län">Blekinge län</option>
                            <option {{ $request->get('lan') === "20" ? "selected" : "" }} value="20" label="Dalarnas län" name="Dalarnas län">Dalarnas län</option>
                            <option {{ $request->get('lan') === "9" ? "selected" : "" }} value="9" label="Gotlands län" name="Gotlands län">Gotlands län</option>
                            <option {{ $request->get('lan') === "21" ? "selected" : "" }} value="21" label="Gävleborgs län" name="Gävleborgs län">Gävleborgs län</option>
                            <option {{ $request->get('lan') === "13" ? "selected" : "" }} value="13" label="Hallands län" name="Hallands län">Hallands län</option>
                            <option {{ $request->get('lan') === "23" ? "selected" : "" }} value="23" label="Jämtlands län" name="Jämtlands län">Jämtlands län</option>
                            <option {{ $request->get('lan') === "6" ? "selected" : "" }} value="6" label="Jönköpings län" name="Jönköpings län">Jönköpings län</option>
                            <option {{ $request->get('lan') === "8" ? "selected" : "" }} value="8" label="Kalmar län" name="Kalmar län">Kalmar län</option>
                            <option {{ $request->get('lan') === "7" ? "selected" : "" }} value="7" label="Kronobergs län" name="Kronobergs län">Kronobergs län</option>
                            <option {{ $request->get('lan') === "25" ? "selected" : "" }} value="25" label="Norrbottens län" name="Norrbottens län">Norrbottens län</option>
                            <option {{ $request->get('lan') === "12" ? "selected" : "" }} value="12" label="Skåne län" name="Skåne län">Skåne län</option>
                            <option {{ $request->get('lan') === "1" ? "selected" : "" }} value="1" label="Stockholms län" name="Stockholms län">Stockholms län</option>
                            <option {{ $request->get('lan') === "4" ? "selected" : "" }} value="4" label="Södermanlands län" name="Södermanlands län">Södermanlands län</option>
                            <option {{ $request->get('lan') === "3" ? "selected" : "" }} value="3" label="Uppsala län" name="Uppsala län">Uppsala län</option>
                            <option {{ $request->get('lan') === "17" ? "selected" : "" }} value="17" label="Värmlands län" name="Värmlands län">Värmlands län</option>
                            <option {{ $request->get('lan') === "24" ? "selected" : "" }} value="24" label="Västerbottens län" name="Västerbottens län">Västerbottens län</option>
                            <option {{ $request->get('lan') === "22" ? "selected" : "" }} value="22" label="Västernorrlands län" name="Västernorrlands län">Västernorrlands län</option>
                            <option {{ $request->get('lan') === "19" ? "selected" : "" }} value="19" label="Västmanlands län" name="Västmanlands län">Västmanlands län</option>
                            <option {{ $request->get('lan') === "14" ? "selected" : "" }} value="14" label="Västra Götalands län" name="Västra Götalands län">Västra Götalands län</option>
                            <option {{ $request->get('lan') === "18" ? "selected" : "" }} value="18" label="Örebro län" name="Örebro län">Örebro län</option>
                            <option {{ $request->get('lan') === "5" ? "selected" : "" }} value="5" label="Östergötlands län" name="Östergötlands län">Östergötlands län</option>
                            <option {{ $request->get('lan') === "90" ? "selected" : "" }} value="90" label="Ospecificerad arbetsort" name="Ospecificerad arbetsort">Ospecificerad arbetsort</option>
                        </select>
                    </div>
                    <select name="{{ config('app.af_type_name_minor') }}" class="form-input" id="job-group">
                        <option {{ $request->get(config("app.af_type_name_minor")) === "" ? 'selected' : '' }} class="defaultOption" value="">Alla yrkesgrupper</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2314" ? 'selected' : '' }} value="2314" label="Doktorander" name="Doktorander">Doktorander</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5312" ? 'selected' : '' }} value="5312" label="Elevassistenter m.fl." name="Elevassistenter m.fl.">Elevassistenter m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2313" ? 'selected' : '' }} value="2313" label="Forskarassistenter m.fl." name="Forskarassistenter m.fl.">Forskarassistenter m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2342" ? 'selected' : '' }} value="2342" label="Fritidspedagoger" name="Fritidspedagoger">Fritidspedagoger</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "9001" ? 'selected' : '' }} value="9001" label="Förskolechef" name="Förskolechef">Förskolechef</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2343" ? 'selected' : '' }} value="2343" label="Förskollärare" name="Förskollärare">Förskollärare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2341" ? 'selected' : '' }} value="2341" label="Grundskollärare" name="Grundskollärare">Grundskollärare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2330" ? 'selected' : '' }} value="2330" label="Gymnasielärare" name="Gymnasielärare">Gymnasielärare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3422" ? 'selected' : '' }} value="3422" label="Idrottstränare och instruktörer m.fl." name="Idrottstränare och instruktörer m.fl.">Idrottstränare och instruktörer m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2320" ? 'selected' : '' }} value="2320" label="Lärare i yrkesämnen" name="Lärare i yrkesämnen">Lärare i yrkesämnen</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3421" ? 'selected' : '' }} value="3421" label="Professionella idrottsutövare" name="Professionella idrottsutövare">Professionella idrottsutövare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2311" ? 'selected' : '' }} value="2311" label="Professorer" name="Professorer">Professorer</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "9000" ? 'selected' : '' }} value="9000" label="Rektorer och skolledare" name="Rektorer och skolledare">Rektorer och skolledare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2351" ? 'selected' : '' }} value="2351" label="Speciallärare och specialpedagoger m.fl." name="Speciallärare och specialpedagoger m.fl.">Speciallärare och specialpedagoger m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2352" ? 'selected' : '' }} value="2352" label="Studie- och yrkesvägledare" name="Studie- och yrkesvägledare">Studie- och yrkesvägledare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3441" ? 'selected' : '' }} value="3441" label="Trafiklärare" name="Trafiklärare">Trafiklärare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2312" ? 'selected' : '' }} value="2312" label="Universitets- och högskolelektorer" name="Universitets- och högskolelektorer">Universitets- och högskolelektorer</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2359" ? 'selected' : '' }} value="2359" label="Övr. pedagoger med teoretisk specialistkompetens" name="Övr. pedagoger med teoretisk specialistkompetens">Övr. pedagoger med teoretisk specialistkompetens</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2319" ? 'selected' : '' }} value="2319" label="Övriga universitets- och högskollärare" name="Övriga universitets- och högskollärare">Övriga universitets- och högskollärare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3449" ? 'selected' : '' }} value="3449" label="Övriga utbildare och instruktörer" name="Övriga utbildare och instruktörer">Övriga utbildare och instruktörer</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "9002" ? 'selected' : '' }} value="9002" label="Övrigt" name="Övrigt">Övrigt</option>
                    </select>
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
                                <label class="sr-only" for="submit">Återställ filtrering</label>
                                <button title="Återställ filtrering" class="form-input form-input--btn btn btn-danger" id="reset" type="button" @click="resetSearchFilters()"><span class="glyphicon glyphicon-repeat"></span></button>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </aside>

            <div class="results-wrapper">
                <search-results></search-results>
            </div>
        </div>

    </section>
@endsection