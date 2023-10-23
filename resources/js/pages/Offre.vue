<template>

    <div class="container" style=" margin-top : 150px;">
        <h3 class="fw-bold text-secondary text-center mb-5">EXPLOREZ ICI TOUTES NOS OFFRES</h3>

        <div class="card w-100 mb-3 mt-4" style="border-left: solid 5px #1117AB; border-bottom: solid 5px #1117AB;" v-for="offre in offres" :key="offre.id">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 mt-2 overlay zoom d-md-block d-none">
                        <img class="img-thumbnail" :src=" '/storage/'+offre.photo" alt="Image offre">
                    </div>
                    <div class="col-md-8 col-12">
                        <h5 class="card-title fw-bold">{{ offre.titre }}</h5>
                        <p class="pt-3"><i class="far fa-calendar-alt"></i><span > Date des inscriptions</span ><span> &nbsp;&nbsp;  Du <span  class="fw-bold">{{ formatDate(offre.debut_inscription) }}</span> au <span  class="fw-bold">{{ formatDate(offre.fin_inscription) }}</span></span></p>
                        <p class=""><i class="far fa-calendar-alt"></i><span > Date de la rentrée</span ><span> &nbsp;&nbsp; <span  class="fw-bold">{{ formatDate(offre.debut_formation) }}</span></span></p>
                            <hr>
                        <p class="card-text">{{ offre.description }}</p>
                            <div class="d-flex justify-content-end mt-5">
                                <router-link :to="{name: 'offreDetail', params: {id: offre.id}}"  class="btn btn-submit float-right text-white waves-effect waves-light">Je postule

                                </router-link>
                                <router-link :to="{name: 'offreDetail', params: {id: offre.id}}"  class="btn btn-submit float-right text-white waves-effect waves-light ms-2">Voir en détail
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
        name: 'Offre',
        data() {
            return {
                offres : []
            }
        },
        mounted(){
            this.getListe()
        },
        methods : {

            getListe(){
                this.$url.get('offres', this.data).then(response => {
                    this.offres = response.data.data
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
                const heure = dateObj.getHours().toString().padStart(2,'0');
                const minutes = dateObj.getMinutes().toString().padStart(2,'0');
                return `${jour}-${mois}-${annee} à ${heure} : ${minutes}`;
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
