<template>
    <h3>Antal sökträffar: <span id="numberOfJobMatches" v-if="jobsObj">{{ jobsObj.searchMeta.all }}</span></h3>

    <div v-if="jobsObj">
        <div v-for="job in jobsObj.allJobs">
            <custom-job-puff :job-data="job" v-if="!job.annonsid"></custom-job-puff>
            <job-puff :job-data="job" v-else></job-puff>
        </div>
    </div>

    <!--@if (!empty($jobs))-->
        <!--@foreach($jobs as $job)-->
            <!--@if(key_exists('annonsid', $job))-->
                <!--@include('pages.partials.job-puff')-->
            <!--@else-->
            <!--{{&#45;&#45;                @if((\Carbon\Carbon::now()->lte(Carbon\Carbon::parse($job->latest_application_date))))&#45;&#45;}}-->
            <!--@include('pages.partials.custom-job-puff')-->
                <!--{{&#45;&#45;@endif&#45;&#45;}}-->
            <!--@endif-->

        <!--@endforeach-->
    <!--@else-->
    <div v-else class="searchResults">

        <div id="numSearchResults">
            <h4>Inga fler jobb hittades!</h4>
        </div>

    </div>
    <!--@endif-->

    <div id="pagination" v-if="jobsObj">
        {{{ jobsObj.paginatorMarkup }}}
    </div>

</template>

<script>
    export default {
        created() {
            if(!this.jobsObj){
                this.fetchJobs();
            }
        },

        data: function() {
            return {
                jobsObj: null,
                currPage: null
            }
        },

        props: {},

        methods: {
            fetchJobs: function(){
                console.log('fetching jobsObj..');
                console.log(this.getUrlParameterByName('sida'));

                this.currPage = this.getUrlParameterByName('sida');
                let url = 'api/fetchJobs';

                if(this.currPage){
                    url += '?sida=' + this.currPage;
                }

                this.$http.get(url).then((response) => {
                    this.jobsObj = JSON.parse(response.body);
                    this.preventPaginationLinkFollow();
                    console.log(this.jobsObj);
                }, (response) => {
                    console.log('Error fetching jobs');
                });
            },

            getUrlParameterByName: function(name, url){
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            },

            preventPaginationLinkFollow: function(){
                const links = document.querySelectorAll("ul.pagination > li > a");

                for(let i = 0; i > links.length; i++){
                    links[i].addEventListener("click", e => {
                        e.preventDefault();
                        console.log(e.target);
                    })
                }
            }
        }
    }
</script>
