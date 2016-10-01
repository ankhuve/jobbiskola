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
                                <div class="input-group input-group-full">
                                    <label class="sr-only" for="workArea">Yrkestyp</label>
                                    <select name="yrkesomraden" class="form-input" id="workArea" style="display: block;">
                                        <option class="defaultOption" value="" selected>Alla yrkesområden</option>
                                        <option value="1" label="Administration, ekonomi, juridik" name="Administration, ekonomi, juridik">Administration, ekonomi, juridik</option>
                                        <option value="2" label="Bygg och anläggning" name="Bygg och anläggning">Bygg och anläggning</option>
                                        <option value="20" label="Chefer och verksamhetsledare" name="Chefer och verksamhetsledare">Chefer och verksamhetsledare</option>
                                        <option value="3" label="Data/IT" name="Data/IT">Data/IT</option>
                                        <option value="5" label="Försäljning, inköp, marknadsföring" name="Försäljning, inköp, marknadsföring">Försäljning, inköp, marknadsföring</option>
                                        <option value="6" label="Hantverksyrken" name="Hantverksyrken">Hantverksyrken</option>
                                        <option value="7" label="Hotell, restaurang, storhushåll" name="Hotell, restaurang, storhushåll">Hotell, restaurang, storhushåll</option>
                                        <option value="8" label="Hälso- och sjukvård" name="Hälso- och sjukvård">Hälso- och sjukvård</option>
                                        <option value="9" label="Industriell tillverkning" name="Industriell tillverkning">Industriell tillverkning</option>
                                        <option value="10" label="Installation, drift, underhåll" name="Installation, drift, underhåll">Installation, drift, underhåll</option>
                                        <option value="4" label="Kropps- och skönhetsvård" name="Kropps- och skönhetsvård">Kropps- och skönhetsvård</option>
                                        <option value="11" label="Kultur, media, design" name="Kultur, media, design">Kultur, media, design</option>
                                        <option value="22" label="Militärt arbete" name="Militärt arbete">Militärt arbete</option>
                                        <option value="13" label="Naturbruk" name="Naturbruk">Naturbruk</option>
                                        <option value="14" label="Naturvetenskapligt arbete" name="Naturvetenskapligt arbete">Naturvetenskapligt arbete</option>
                                        <option value="15" label="Pedagogiskt arbete" name="Pedagogiskt arbete">Pedagogiskt arbete</option>
                                        <option value="12" label="Sanering och renhållning" name="Sanering och renhållning">Sanering och renhållning</option>
                                        <option value="16" label="Socialt arbete" name="Socialt arbete">Socialt arbete</option>
                                        <option value="17" label="Säkerhetsarbete" name="Säkerhetsarbete">Säkerhetsarbete</option>
                                        <option value="18" label="Tekniskt arbete" name="Tekniskt arbete">Tekniskt arbete</option>
                                        <option value="19" label="Transport" name="Transport">Transport</option>
                                    </select>
                                </div>
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