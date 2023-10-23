<template>
    <div class="content-body">
         <!-- row -->
         <div class="container-fluid">

             <div class="row page-titles mx-0">
                 <div class="col-sm-6 p-md-0">
                     <div class="welcome-text">
                         <h4>Toutes les actualités</h4>
                     </div>
                 </div>
                 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><router-link to="/home">Dashbord</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/actualites/liste">Actualités</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/actualites/liste">Liste des actualités</router-link></li>
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
                                     <router-link to="/admin/actualites/ajout" class="btn btn-primary">+ Ajouter un nouveau</router-link>
                                 </div>
                                 <div class="card-body">
                                     <div class="table-responsive">
                                         <table id="actualiteTable" class="display w-100">
                                             <thead>
                                                 <tr class="py-2">

                                                     <th>Photo</th>
                                                     <th>Date</th>
                                                     <th>Domaine</th>
                                                     <th>Titre</th>
                                                     <th>Détail</th>
                                                     <th>Actions</th>

                                                 </tr>
                                             </thead>
                                             <tbody>

                                                 <tr v-for="actualite in actualites" :key="actualite.id">
                                                     <td><img class="" width="50" height="50" :src=" '/storage/'+actualite.photo" alt=""></td>
                                                     <td>{{ actualite.date }}</td>
                                                     <td>{{ actualite.domaine }}</td>
                                                     <td>{{ actualite.titre }}</td>
                                                     <td>
                                                        {{ actualite.detail.length < 300?actualite.detail:actualite.detail.slice(0,300) + ' ...'}}

                                                     </td>

                                                     <td>
                                                        <button @click="openModal(actualite.id)" ref="modalLink" class="btn btn-sm btn-primary"  data-target=".bd-example-modal-lg"><i class="la la-pencil"></i></button>
                                                        <a class="btn btn-sm btn-danger ml-2" @click="supprimerActualite(actualite.id)"><i class="la la-trash-o"></i></a>
                                                     </td>
                                                 </tr>
                                                 <div class="modal fade bd-example-modal-lg" ref="modalElement">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modification d'une actualité</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form @submit.prevent="updateActualite" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Titre de l'actualité  </label>
                                                                                <input type="text" class="form-control" v-model="titre" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Date de publication</label>
                                                                                <input type="date" class="form-control" v-model="date" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Domaine d'action</label>
                                                                                <input type="text" class="form-control" v-model="domaine">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Photo illustrative</label>
                                                                                <input type="file" accept=".jpeg,.jpg,.png,.avif" class=" form-control"  ref="fileInput" @change="handleFileChange">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Détail de l'actualité</label>
                                                                                <textarea v-model="detail" class="datepicker-default form-control" id="datepicker1" rows="10" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" v-model="actualiteId">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                                                                            <button type="reset" class="btn btn-light px-3">Annuler</button>
                                                                            <button type="submit" class="btn btn-primary px-3 ml-3">Enrégistrer</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
     name: 'ListeActualite',
     data() {
        return {
            actualites: [],
            titre: '',
            date:'',
            detail: '',
            photo:null,
            actualiteId: 'null',
            domaine:'',
        }
     },
     methods: {
        handleFileChange(event) {
            this.photo = event.target.files[0];
        },
         initDataTable() {
             $('#actualiteTable').DataTable({
                 'order': [],
             });
         },

        getListe(){
            this.$url.get('actualites', this.data).then(response => {

            this.actualites = response.data.data
            })
            .catch(function (error) {
            console.error(error);
            });
        },
        supprimerActualite(id){

            if(confirm('Voulez-vous vraiment supprimer cette actualité ?')){
                this.$url.delete('actualites/'+id).then(response => {
                    console.log(response)
                    const index = this.actualites.findIndex((a) => a.id === id);
                    if (index !== -1) {
                        this.actualites.splice(index, 1);
                    }

                    toastr.success('Actualité supprimée avec succès !', {timeOut: 3000})
                })
                .catch(function (error) {
                console.error(error);
                });
            }
        },
        openModal(id){
            this.$url.get('actualites/'+id).then(response =>{

                console.log(response.data.data)
                let data = response.data.data
                this.titre = data.titre
                this.domaine = data.domaine
                this.detail = data.detail
                this.date = data.date
                this.actualiteId = data.id
                this.photo = data.photo
                let element = this.$refs.modalElement
                $(element).modal('show')
            })
        },

        updateActualite(){
            const config = { headers: { "Content-Type": "multipart/form-data" } };
            const formData = new FormData();
            formData.append('titre', this.titre)
            formData.append('date', this.date)
            formData.append('domaine', this.domaine)
            formData.append('detail', this.detail)
            formData.append('photo', this.photo)
            formData.append('actualiteId', this.actualiteId)
            console.log(formData)
            this.$url.post('actualites/update', formData).then(response=>{
                console.log(response.data)
                let element = this.$refs.modalElement
                $(element).modal('hide')
                toastr.success('Actualité mise à jour avec succès  !', {timeOut: 3000})
                this.getListe()
            })
        }
     },
     created(){
        this.getListe()
        $('#actualiteTable').DataTable().destroy();
        $('#actualiteTable').DataTable({
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
