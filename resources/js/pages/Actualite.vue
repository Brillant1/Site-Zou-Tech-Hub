<template>

    <div class="container" style=" margin-top : 150px;">
        <h3 class="fw-bold text-secondary text-center mb-5">EXPLOREZ ICI TOUTES NOS ACTUALITES</h3>

        <div class="card w-100 mb-3 mt-4" style="border-left: solid 5px #1117AB; border-bottom: solid 5px #1117AB;" v-for="actualite in actualites" :key="actualite.id">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 mt-2 overlay zoom d-md-block d-none ">
                        <img class="img-thumbnail" :src=" '/storage/'+actualite.photo" alt="Image actualité">
                    </div>
                    <div class="col-md-8 col-12  mt-1 mt-sm-3 mb-0">
                        <h5 class="card-title font-M-Bold">{{ actualite.titre }}</h5>
                        <p class="py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            <span> &nbsp;&nbsp; {{ formatDate(actualite.date) }}</span></p>
                        <p class="card-text">{{ actualite.detail }}</p>
                            <div class="d-flex justify-content-end mt-5">
                                <router-link :to="{name: 'actualiteDetail', params: {id: actualite.id}}"  class="btn btn-submit float-right text-white waves-effect waves-light">Lire la suite
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
</template>

<script>
    export default {
        name: 'Actualite',
        data() {
            return {
                actualites : []
            }
        },
        mounted(){
            this.getListe()
        },
        methods : {

            getListe(){
                this.$url.get('actualites', this.data).then(response => {

                this.actualites = response.data.data
                console.log(this.actualites)
                })
                .catch(function (error) {
                console.error(error);
                });
            },
            formatDate(dateString) {
                const dateObj = new Date(dateString);
                const jour = dateObj.getDate().toString().padStart(2, '0');
                const mois = (dateObj.getMonth() + 1).toString().padStart(2, '0'); // Ajouter 1 car les mois sont indexés à partir de 0
                const annee = dateObj.getFullYear();
                return `${jour}-${mois}-${annee}`;
            },

        },
        filters: {
            french_date_format: function(value) {
                return moment(String(value)).format('DD/MM/YYYY HH:mm');
            },
        }
    }
</script>

<style lang="css" scoped>
    .img-thumbnail{
        height:350px
    }
</style>
