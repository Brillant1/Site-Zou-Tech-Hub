<template>
    <section class="" style=" margin-top:120px;">
        <div class="container">
            <h3 class="fw-bold text-secondary text-center">DECOUVREZ TOUTES NOS FORMATIONS</h3>
        <p class="text-center mb-5">Notre équipe d'enseignants est dotée d'un professionnalisme de qualité pour vous former efficacement</p>
            <div class="row d-flex align-items-center">
                <div class="row justify-content-start">

                    <div class="col-lg-4 col-md-6  col-sm-12 mt-4 " v-for="formation in formations" :key="formation.id">
                        <div class="card h-100 border-0 shadow rounded p-3">
                                <img :src=" '/storage/'+formation.photo" class="card-img-top"
                                    alt="..." style=" height:250px; width:100%;">

                            <div class="card-body ps-0">
                                <h4 class="card-title font-weight-bold fs-5 rosette-text-orange text-center text-uppercase fw-bold">
                                    {{ formation.titre }}
                                </h4>
                                <p class="card-text mt-3 title-activity-content text-justify ">
                                    {{ formation.description.length < 300?formation.description:formation.description.slice(0,300) + ' ...'}}
                                </p>
                            </div>
                            <div class=" d-flex justify-content-end">
                                <router-link :to="{name: 'formationDetail', params: {id: formation.id}}"  class="btn btn-submit float-right text-white waves-effect waves-light">Lire la suite
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </router-link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</template>

<script>
    export default {
        name: 'Formation',
        data() {
            return {
                formations : []
            }
        },
        mounted(){
            this.getListe()
        },
        methods : {

            getListe(){
                this.$url.get('formations', this.data).then(response => {
                this.formations = response.data.data
                })
                .catch(function (error) {
                console.error(error);
                });
            },

        },

        filters: {
            french_date_format: function(value) {
                return moment(String(value)).format('DD/MM/YYYY HH:mm');
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
