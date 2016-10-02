<div class="panel panel-custom col-lg-10 col-lg-offset-1">
    <div class="panel-heading">
        <h2>
            {{ $data['title'] }}
        </h2>
    </div>

    <div class="panel-body">
        <div class="well">
            <p style="white-space: pre-line">{!! $data['description'] !!}</p>
        </div>
        <div class="moreInfo">
            {{--<p class="extraJobInfo"> Varaktighet: {{ $jobMatch->villkor->varaktighet }} </p>--}}
            <p class="extraJobInfo"> Kommun:  {{ $data['municipality'] }}</p>
            {{--<p class="extraJobInfo"> Publicerad: {{ date('d-m-Y', strtotime($jobMatch->annons->publiceraddatum)) }} </p>--}}
            {{--<p class="extraJobInfo"> Dagar sedan publicering: {{ $daysSincePublished }} </p>--}}
            {{--<p class="extraJobInfo"><a href="{{ $jobMatch->annons->platsannonsUrl }}">Länk till arbetsförmedlingen</a></p>--}}
            <div>Kontaktadress: {{ $data['contact_email'] }}</div>
            <div class="extraJobInfo">Sista ansökningsdag: {{ $data['latest_application_date'] }}</div>
        </div>
    </div>
</div>