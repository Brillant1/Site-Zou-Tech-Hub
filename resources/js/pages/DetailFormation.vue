<template>
     <div >
        <div class="mt-5 d-flex flex-column justify-content-center align-items-center">

            <div class="d-flex mb-3 justify-content-between align-items-center container" style="margin-top:100px">
                <router-link to="/formations" style="cursor: pointer;" class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff8000" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </router-link>
                <p class="text-center h2 fw-bold text-uppercase ">Détail sur la formation</p>
                <p></p>
            </div>



            <div class="shadow container p-4 details-container">
                <div class="">
                    <img :src=" '/storage/'+formation.photo" alt="" class="w-100" style="height: 600px; width:100%; " >

                    <div class="d-flex flex-column mt-5">
                        <h3 class="rosette-text-green pb-4"> {{ formation.titre }}</h3>
                        <div class="mt-2">
                            <!-- <p>Exécutée  du: <span class="fw-bold">{{ offre.debut_inscription }} au {{ offre.fin_inscription }} </span> </p> -->
                            <p>Publié le: <span class=" fw-bold">{{ formatDate(formation.created_at) }} </span></p>
                            <p class=""><span class="bg-success text-white p-2">Formation certifiante</span></p>
                            <p>Durée de la formation: 2 mois</p>
                            <p>Vous sortez professionnel et prêt à emploi</p>
                        </div>
                        <!-- <p> <span class=" rosette-text-orange"> <span class=" text-dark">Domaine d'action:</span> nom</span></p> -->
                    </div>
                </div>
                <hr>
                <div>
                    <p>{{ formation.description }}</p>

                </div>
                <div class="d-flex justify-content-center align-items-center action-button">
                    <router-link to="/formations" class="btn btn-primary px-5 rounded-pill me-3">Retour aux formations</router-link>
                    <router-link to="/contact" class="btn bg-secondary px-5 rounded-pill text-white ms-3">Nous contacter</router-link>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import { useRoute } from 'vue-router'
    export default {
        name:'DetailFormation',
        data(){
            return{
                formation : null
            }
        },
        created(){
            const route = useRoute();
            this.$url.get('formations/'+route.params.id).then(response =>{
                console.log(response)
                let data = response.data.data
                this.formation = data
            })
        },
        methods: {
            formatDate(dateString) {
                const dateObj = new Date(dateString);
                const jour = dateObj.getDate().toString().padStart(2, '0');
                const mois = (dateObj.getMonth() + 1).toString().padStart(2, '0'); // Ajouter 1 car les mois sont indexés à partir de 0
                const annee = dateObj.getFullYear();
                const heure = dateObj.getHours().toString().padStart(2,'0');
                const minutes = dateObj.getMinutes().toString().padStart(2,'0');
                return `${jour}-${mois}-${annee}`;
            },
        },
        computed : {
            format_date(date){
                return date.getDate() +'-' +getMonth() + '-'+getFullYear();
            }
        }

    }
</script>

<style lang="css" scoped>

</style>
