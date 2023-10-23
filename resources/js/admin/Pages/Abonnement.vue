<template>
    <div class="content-body">
         <!-- row -->
         <div class="container-fluid">

             <div class="row page-titles mx-0">
                 <div class="col-sm-6 p-md-0">
                     <div class="welcome-text">
                         <h4>Tous les abonnements</h4>
                     </div>
                 </div>
                 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><router-link to="/home">Dashbord</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/abonnements">Abonnements</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/abonnements">Liste des abonnements</router-link></li>
                     </ol>
                 </div>
             </div>

             <div class="row">
                 <div class="col-lg-12">
                     <div class="row tab-content">
                         <div id="list-view" class="tab-pane fade active show col-lg-12">
                             <div class="card">
                                 <div class="card-header">
                                     <h4 class="card-title">Dashboard  </h4>
                                     <!-- <router-link to="/admin/actualites/ajout" class="btn btn-primary">+ Ajouter un nouveau</router-link> -->
                                 </div>
                                 <div class="card-body">
                                     <div class="table-responsive">
                                         <table id="abonnementTable" class="display w-100">
                                             <thead>
                                                 <tr class="py-2">


                                                     <th>Date</th>
                                                     <th>Email</th>
                                                     <th>Actions</th>

                                                 </tr>
                                             </thead>
                                             <tbody>

                                                 <tr v-for="abonnement in abonnements" :key="abonnement.id">
                                                     <td>{{  formatDate(abonnement.created_at) }}</td>
                                                     <td>{{ abonnement.email }}</td>
                                                     <td>
                                                        <button @click="openModal(abonnement.id)" ref="modalLink" class="btn btn-sm btn-primary"  data-target=".bd-example-modal-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>
                                                        </button>
                                                        <a class="btn btn-sm btn-danger ml-2" @click="supprimerAbonnement(abonnement.id)"><i class="la la-trash-o"></i></a>
                                                     </td>
                                                 </tr>

                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

         </div>
     </div>
</template>

<script>
    import { useToastr } from '@/toastr.js';
    const toastr = useToastr();
 export default {
     name: 'ListeAbonnement',
     data() {
        return {
            abonnements: [],
            abonnementId: 'null',
        }
     },
     methods: {

         initDataTable() {
             $('#abonnementTable').DataTable({
                 'order': [],
             });
         },

        getListe(){
            this.$url.get('subscribes').then(response => {

            this.abonnements = response.data.data
            console.log(response)
            })
            .catch(function (error) {
            console.error(error);
            });
        },
        supprimerAbonnement(id){

            if(confirm('Voulez-vous vraiment supprimer cet abonnement ?')){
                this.$url.delete('subscribes/'+id).then(response => {
                    console.log(response)
                    const index = this.abonnements.findIndex((a) => a.id === id);
                    if (index !== -1) {
                        this.abonnements.splice(index, 1);
                    }

                    toastr.success('Abonnement supprimée avec succès !', {timeOut: 3000})
                })
                .catch(function (error) {
                console.error(error);
                });
            }
        },
        openModal(id){
            this.$url.get('subscribes/'+id).then(response => {

                console.log(response.data.data)
                let data = response.data.data
                this.titre = data.titre
                this.domaine = data.domaine
                this.detail = data.detail
                this.date = data.date
                this.photo = data.photo
                let element = this.$refs.modalElement
                $(element).modal('show')
            })
        },
        formatDate(dateString) {
            const dateObj = new Date(dateString);
            const jour = dateObj.getDate().toString().padStart(2, '0');
            const mois = (dateObj.getMonth() + 1).toString().padStart(2, '0'); // Ajouter 1 car les mois sont indexés à partir de 0
            const annee = dateObj.getFullYear();
            return `${jour}-${mois}-${annee}`;
        },

     },
     created(){
        this.getListe()
        $('#abonnementTable').DataTable().destroy();
        $('#abonnementTable').DataTable({
            "aaSorting": []
        });

     },
     mounted() {
        this.initDataTable();
     },
     update() {
        $('#abonnementTable').DataTable().destroy();
        $('#abonnementTable').DataTable({
            "order": []
        });
     },
    watch: {
        actualites: {
        handler() {
            // Détruisez et réinitialisez la DataTable lorsque abonnements change.
            $('#abonnementTable').DataTable().destroy();
            this.initDataTable();

        },
        deep: true // Pour observer les changements profonds dans abonnements.
        }
    }
 }
</script>


<style lang="css" scoped>

</style>
