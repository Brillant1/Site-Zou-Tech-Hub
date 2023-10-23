<template>
    <div class="content-body">
         <!-- row -->
         <div class="container-fluid">

             <div class="row page-titles mx-0">
                 <div class="col-sm-6 p-md-0">
                     <div class="welcome-text">
                         <h4>Toutes les candidatures</h4>
                     </div>
                 </div>
                 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><router-link to="/home">Dashbord</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/inscriptions">Candidatures</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/inscriptions">Liste des candidatures</router-link></li>
                     </ol>
                 </div>
             </div>



             <div class="row">
                <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Toutes les candidatures</h4>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home">Nouvelles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile">Traitées</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="actualiteTable" class="display w-100">
                                                        <thead>
                                                            <tr class="py-2">

                                                                <th>Date</th>
                                                                <th>Nom</th>
                                                                <th>Email</th>
                                                                <th>Adresse</th>
                                                                <th>Profession</th>
                                                                <th>Numero</th>
                                                                <th>CV</th>
                                                                <th>Offre</th>
                                                                <th>Actions</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr v-for="subscribe in subscribes1" :key="subscribe.id">
                                                                <td>{{ formatDate(subscribe.created_at) }}</td>
                                                                <td>{{ subscribe.nom }}</td>
                                                                <td>{{ subscribe.email }}</td>
                                                                <td>{{ subscribe.adresse }}</td>
                                                                <td>{{ subscribe.profession }}</td>
                                                                <td>{{ subscribe.numero }}</td>
                                                                <td><a :href=" '/storage/' + subscribe.cv" target="_blank"  class="text-primary">Visualiser</a></td>
                                                                <td>{{ subscribe.offre.titre }}</td>

                                                                <td>
                                                                <a class="btn btn-sm btn-primary ml-2" title="Marquer comme traitée" @click="changeState(subscribe.id)">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                                    </svg>
                                                                </a>
                                                                <a class="btn btn-sm btn-danger ml-2" title="Supprimer" @click="supprimerSubscribe(subscribe.id)"><i class="la la-trash-o"></i></a>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="subscribeTable" class="display w-100">
                                                        <thead>
                                                            <tr class="py-2">

                                                                <th>Date</th>
                                                                <th>Nom</th>
                                                                <th>Email</th>
                                                                <th>Adresse</th>
                                                                <th>Profession</th>
                                                                <th>Numero</th>
                                                                <th>CV</th>
                                                                <th>Offre</th>
                                                                <th>Actions</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr v-for="subscribe in subscribes2" :key="subscribe.id" class="py-3">
                                                                <td>{{ formatDate(subscribe.created_at) }}</td>
                                                                <td>{{ subscribe.nom }}</td>
                                                                <td>{{ subscribe.email }}</td>
                                                                <td>{{ subscribe.adresse }}</td>
                                                                <td>{{ subscribe.profession }}</td>
                                                                <td>{{ subscribe.numero }}</td>
                                                                <td><a :href=" '/storage/' + subscribe.cv" target="_blank"  class="text-primary">Visualiser</a></td>
                                                                <td>{{ subscribe.offre.titre }}</td>

                                                                <td>
                                                                <a class="btn btn-sm btn-primary ml-2" title="Marquer comme non traitée" @click="changeState(subscribe.id)">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                                                    </svg>
                                                                </a>
                                                                <a class="btn btn-sm btn-danger ml-2" title="Supprimer" @click="supprimerSubscribe(subscribe.id)"><i class="la la-trash-o"></i></a>
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


         </div>
     </div>
</template>

<script>
    import { useToastr } from '@/toastr.js';
    const toastr = useToastr();
 export default {
     name: 'ListeCandidature',
     data() {
        return {
            subscribes1: [],
            subscribes2: [],
            candidatureId: null,
            nom: ''
        }
     },
     methods: {

         initDataTable() {
            $('#actualiteTable').DataTable({
                'order': [],
            });
            $('#subscribeTable').DataTable({
                'order': [],
            });

         },

        getListe(){
            this.$url.get('subscribes', this.data).then(response => {
            this.subscribes1 = response.data.data1
            this.subscribes2 = response.data.data2
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
        supprimerCandidature(id){
            if(confirm('Voulez-vous vraiment supprimer cette actualité ?')){
                this.$url.delete('subscribes/'+id).then(response => {

                    const index = this.subscribes.findIndex((a) => a.id === id);
                    if (index !== -1) {
                        this.subscribes.splice(index, 1);
                    }
                    toastr.success('Candidature supprimée avec succès !', {timeOut: 3000})
                })
                .catch(function (error) {
                console.error(error);
                });
            }
        },
        changeState(id){
            if(confirm("Voulez-vous marquer cette candidature comme déjà traitée ?")){
                const form = new FormData()
                form.append('subscribeId', id)
                this.$url.post('subscribes/update', form).then(response=> {
                    this.getListe()
                    toastr.success('Candidature marquée comme traitée', {timeOut: 3000})
                })
            }
        }
     },
     created(){
        this.getListe()
        $('#actualiteTable').DataTable().destroy();
        $('#actualiteTable').DataTable({
            "aaSorting": []
        });

        $('#subscribeTable').DataTable().destroy();
        $('#subscribeTable').DataTable({
            "aaSorting": []
        });

     },
     mounted() {
        this.initDataTable();
     },
     update() {
        $('#actualiteTable').DataTable().destroy();
        $('#actualiteTable').DataTable({
            "order": []
        });

        $('#subscribeTable').DataTable().destroy();
        $('#subscribeTable').DataTable({
            "order": []
        });
     },
     watch: {
         abonnements: {
            handler() {
                // Détruisez et réinitialisez la DataTable lorsque abonnements change.
                $('#actualiteTable').DataTable().destroy();
                this.initDataTable();
            },
            deep: true // Pour observer les changements profonds dans abonnements.
         }
     }
 }
</script>


<style lang="scss" scoped>

</style>
