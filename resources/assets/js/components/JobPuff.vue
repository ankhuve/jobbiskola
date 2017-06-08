<template>
    <div class="block block--job col-md-6" id="{{ jobData.annonsid }}">
        <a href="{{ jobData.url }}" >
            <div class="block-bg">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="block--title">
                            <h2>{{ jobData.annonsrubrik }}</h2>
                        </div>

                        <div class="block--description">
                            <p>Företag: <span class="text-focus">{{ jobData.arbetsplatsnamn }}</span></p>
                            <p>Arbetsort: <span class="text-focus">{{ jobData.kommunnamn }}</span></p>
                        </div>
                    </div>

                    <div class="block--bottom col-xs-12">
                        <div title="Dagar sedan jobbet publicerades.">
                            <img class="icon--small" src="{{ asset('img/time_ago.png') }}"/>
                            <span>
                            <!--{{ (\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:se', jobData.publiceraddatum)->isSameDay(\Carbon\Carbon::today())) ? 'Publicerad idag' : ((\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:se', jobData.publiceraddatum)->isSameDay(\Carbon\Carbon::yesterday())) ? 'Publicerades igår' : \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:se', jobData.publiceraddatum)->startOfDay()->diffInDays(Carbon\Carbon::now()) . ' dagar sedan publicering') }}-->
                        </span>
                        </div>
                        <div title="Sista ansökningsdatum för jobbet.">
                            <img class="icon--small" src="{{ asset('img/calendar.png') }}"/>
                            <span v-if="jobData.sista_ansokningsdag">{{ substr(jobData.sista_ansokningsdag, 0, 10) }}</span>
                            <span v-else>-</span>
                        </div>
                    </div>
                </div>

            </div>
        </a>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
            }
        },

        props: ['jobData'],

        methods: {

        },

        computed: {
            lastApplicationDay: function(){
                return this.jobData
            }
        }
    }
</script>
