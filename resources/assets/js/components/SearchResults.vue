<template>
    <h3 v-show="jobsObj.searchMeta">Antal sökträffar:
        <span id="numberOfJobMatches" transition="stagger">{{ jobsObj.searchMeta ? jobsObj.searchMeta.all : "" }}</span>
    </h3>

    <div v-for="job in jobsObj.allJobs" transition="stagger" enter-stagger="25">
        <custom-job-puff :job-data="job" v-if="!job.annonsid"></custom-job-puff>
        <job-puff :job-data="job" v-if="job.annonsid"></job-puff>
    </div>

    <template v-if="jobsObj.paginator && jobsObj.paginator.data.length === 0">
        <div id="numSearchResults">
            <h4>Inga fler jobb hittades!</h4>
        </div>
    </template>

    <div v-show="!showJobs">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div id="pagination" v-show="showPagination">
        {{{ jobsObj.paginatorMarkup }}}
    </div>

</template>

<script>
    export default {
        created() {
            if(this.jobsObj.length === 0){
                this.fetchJobs();
            }

            window.addEventListener('popstate', e => {
                var state = e.state;
                this.fetchJobs();
            });
        },

        data: function() {
            return {
                jobsObj: [],
                currPage: null,
                showPagination: false,
                showJobs: false,
                infoText: 'Inga fler jobb hittades!',
                errorOccurred: false,
                parameters: {
                    'sida': '',
                    'lan': '',
                    'q': '',
                    'yrkesgrupper': ''
                }
            }
        },

        props: {},

        methods: {
            fetchJobs: function(){
                this.showJobs = false;
                this.showPagination = false;

                $('html, body').animate({
                    scrollTop: window.screenTop
                }, 500);

                this.currPage = this.getUrlParameterByName('sida');

                var parameters = {};
                for (var p in this.parameters){
                    parameters[p] = this.getUrlParameterByName(p);
                }

                var url = 'api/fetchJobs';

                this.jobsObj = {};

                this.$http.post(url, parameters).then((response) => {
                    this.jobsObj = response.json();
                    this.showJobs = true;

                    setTimeout(() => {
                        this.showPagination = true;

                        Vue.nextTick(() => {
                            this.setPaginationEventListeners();
                        });
                    }, 500);

                }, (response) => {
                    console.log('Error fetching jobs');
                    this.errorOccurred = true;
                    this.showPagination = true;
                });
            },

            getUrlParameterByName: function(name, url){
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            },

            setPaginationEventListeners: function(){
                var links = document.querySelectorAll("ul.pagination > li > a");

                for(var i = 0; i < links.length; i++){
                    links[i].addEventListener("click", e => {
                        e.preventDefault();

                        // add the correct parameters to the url
                        var queryString = '';
                        var count = 0;
                        for (var p in this.parameters){
                            if (this.getUrlParameterByName(p, e.target)) {
                                if (count === 0) {
                                    queryString += '?' + p + '=' + this.getUrlParameterByName(p, e.target);
                                } else {
                                    queryString += '&' + p + '=' + this.getUrlParameterByName(p, e.target);
                                }
                            }
                            count++;
                        }

                        window.history.pushState(null, null, queryString);
                        this.fetchJobs();
                    })
                }
            }
        }
    }
</script>
