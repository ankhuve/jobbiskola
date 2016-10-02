@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 newJobContainer">
                <div class="messageBoxHeading">Skapa jobbannons</div>
                <div class="panel-body">
                    @include('errors.validation')

                    {!! Form::open(['method' => 'POST', 'action' => 'CompanyController@confirm', 'class'=>'form-horizontal']) !!}



                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">Jobbtitel <span class="required">*</span></label>
                        <div class="col-md-9">
                            {!! Form::input('text', 'title', Request::get('title'), ['class' => 'form-control input-lg', 'placeholder' => 'Kökspersonal på restaurang, telefonförsäljare..']) !!}
                        </div>
                    </div>



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

                    <div class="form-group">
                        <label class="col-md-2 control-label">Kommun <span class="required">*</span></label>
                        <div class="col-md-3">
                            {!! Form::input('text', 'municipality', Request::get('municipality'), ['class' => 'form-control']) !!}
                        </div>

                        <label class="control-label col-md-2">Arbetsplats <span class="required">*</span></label>
                        <div class="col-md-4">
                            {!! Form::text('work_place', Request::get('work_place'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-9 col-md-offset-2">
                            <label for="description">Beskrivning <span class="required">*</span></label>
                            {!! Form::textarea('description', Request::get('description'), ['class' => 'form-control summernote', 'id' => 'description', 'placeholder' => 'Beskriv jobbets uppgifter, förkunskaper, krav osv.']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Sista ansökan <span class="required">*</span></label>
                        <div class="col-md-3">
                            {!! Form::date('latest_application_date', Request::get('latest_application_date') ? : Carbon\Carbon::today()->addMonth(1), ['class' => 'form-control']) !!}
                        </div>

                        <label class="col-md-3 control-label">Kontaktperson (email) <span class="required">*</span></label>
                        <div class="col-md-3">
                            {!! Form::email('contact_email', Request::get('contact_email') ? : $user->email, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-5 col-md-3 control-label">Extern ansökningslänk</label>
                        <div class="col-md-3">
                            {!! Form::text('external_link', Request::get('external_link'), ['class' => 'form-control', 'placeholder' => 'http://dittföretag.se/ansök']) !!}
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            {!! Form::submit('Skapa', ['class' => 'registerFormSubmitButton col-md-12']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
