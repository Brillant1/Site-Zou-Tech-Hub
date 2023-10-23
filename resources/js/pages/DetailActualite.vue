<template>
     <div >
        <div class="mt-5 d-flex flex-column justify-content-center align-items-center">

            <div class="d-flex mb-3 justify-content-between align-items-center container" style="margin-top:100px">
                <router-link to="/actualites" style="cursor: pointer;" class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff8000" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </router-link>
                <p class="text-center h2 fw-bold text-uppercase ">À propos de l'actualité</p>
                <p></p>
            </div>



            <div class="shadow container p-4 details-container">
                <div class="">
                    <img :src=" '/storage/'+actualite.photo" alt="" class="w-100" style="height: 700px; width:100%; " >

                    <div class="d-flex flex-column mt-5">
                        <h4 class="rosette-text-green pb-4">{{ actualite.titre }}</h4>
                        <div class=" d-flex justify-content-between mt-2">
                            <!-- <p>Exécutée  du: <span class="fw-bold">{{ offre.debut_inscription }} au {{ offre.fin_inscription }} </span> </p> -->
                            <p>Publié le: <span class=" fw-bold">{{ actualite.date }} </span></p>
                        </div>
                        <p> <span class=" rosette-text-orange"> <span class=" text-dark">Domaine d'action:</span> nom</span></p>
                    </div>
                </div>
                <hr>
                <div>
                    <p>{{ actualite.detail }}</p>

                </div>
                <div class="d-flex justify-content-center align-items-center action-button">
                    <router-link to="/actualites" class="btn btn-primary px-5 rounded-pill me-3">Retour aux actualités</router-link>
                    <router-link to="/contact" class="btn bg-secondary px-5 rounded-pill text-white ms-3">Nous contacter</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { useRoute } from 'vue-router'
    export default {
        name:'DetailActualite',
        data(){
            return{
                actualite : null
            }
        },
        created(){
            const route = useRoute();
            this.$url.get('actualites/'+route.params.id).then(response =>{
                console.log(response)
                let data = response.data.data
                this.actualite = data
            })
        },
       
        computed : {
            format_date(date){
                return date.getDate() +'-' +getMonth() + '-'+getFullYear();
            }
        }

    }
</script>

<style lang="css" scoped>
        .details-container{
        border-radius:20px;
    }
</style>
