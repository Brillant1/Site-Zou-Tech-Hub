<template>
    <div class="content-body">
         <!-- row -->
         <div class="container-fluid">

             <div class="row page-titles mx-0">
                 <div class="col-sm-6 p-md-0">
                     <div class="welcome-text">
                         <h4>Toutes les expertises</h4>
                     </div>
                 </div>
                 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><router-link to="/home">Dashbord</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/expertises/liste">Expertises</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/expertises/liste">Liste des expertises</router-link></li>
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
                                     <router-link to="/admin/expertise/ajout" class="btn btn-primary">+ Ajouter une nouvelle</router-link>
                                 </div>
                                 <div class="card-body">
                                     <div class="table-responsive">
                                         <table id="expertiseTable" class="display w-100">
                                             <thead>
                                                 <tr class="py-2">

                                                     <th>Photo</th>


                                                     <th>Titre</th>
                                                     <th>Détail</th>
                                                     <th>Actions</th>

                                                 </tr>
                                             </thead>
                                             <tbody>

                                                 <tr v-for="expertise in expertises" :key="expertise.id">
                                                     <td><img class="" width="50" height="50" :src=" '/storage/'+expertise.photo" alt=""></td>


                                                     <td>{{ expertise.titre }}</td>
                                                     <td>
                                                        {{ expertise.detail.length < 300?expertise.detail:expertise.detail.slice(0,300) + ' ...'}}

                                                     </td>

                                                     <td>
                                                        <button @click="openModal(expertise.id)" ref="modalLink" class="btn btn-sm btn-primary"  data-target=".bd-example-modal-lg"><i class="la la-pencil"></i></button>
                                                        <a class="btn btn-sm btn-danger ml-2" @click="supprimerExpertise(expertise.id)"><i class="la la-trash-o"></i></a>
                                                     </td>
                                                 </tr>
                                                 <div class="modal fade bd-example-modal-lg" ref="modalElement">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modification d'une expertise</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form @submit.prevent="updateExpertise" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Titre de l'expertise  </label>
                                                                                <input type="text" class="form-control" v-model="titre" required>
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
                                                                                <label class="form-label">Détail de l'expertise</label>
                                                                                <textarea v-model="detail" class="datepicker-default form-control" id="datepicker1" rows="10" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" v-model="expertiseId">

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
    import { useToastr } from '../../../toastr.js';
    const toastr = useToastr();
 export default {
     name: 'ListeExpertise',
     data() {
        return {
            expertises: [],
            titre: '',
            detail: '',
            photo:null,
            expertiseId: 'null',

        }
     },
     methods: {
        handleFileChange(event) {
            this.photo = event.target.files[0];
        },
         initDataTable() {
             $('#expertiseTable').DataTable({
                 'order': [],
             });
         },

        getListe(){
            this.$url.get('expertises', this.data).then(response => {
                this.expertises = response.data.data
            })
            .catch(function (error) {
                console.error(error);
            });
        },
        supprimerExpertise(id){

            if(confirm('Voulez-vous vraiment supprimer cette expertise ?')){
                this.$url.delete('expertises/'+id).then(response => {
                    console.log(response)
                    const index = this.expertises.findIndex((a) => a.id === id);
                    if (index !== -1) {
                        this.expertises.splice(index, 1);
                    }

                    toastr.success('Expertise supprimée avec succès !', {timeOut: 3000})
                })
                .catch(function (error) {
                console.error(error);
                });
            }
        },
        openModal(id){
            this.$url.get('expertises/'+id).then(response =>{

                console.log(response.data.data)
                let data = response.data.data
                this.titre = data.titre
                this.detail = data.detail
                this.date = data.date
                this.expertiseId = data.id
                let element = this.$refs.modalElement
                $(element).modal('show')
            })
        },

        updateExpertise(){
            const config = { headers: { "Content-Type": "multipart/form-data" } };
            const formData = new FormData();
            formData.append('titre', this.titre)

            formData.append('detail', this.detail)
            formData.append('photo', this.photo)
            formData.append('expertiseId', this.expertiseId)
            console.log(formData)
            this.$url.post('expertises/update', formData).then(response=>{
                console.log(response.data)
                let element = this.$refs.modalElement
                $(element).modal('hide')
                toastr.success('Expertise mise à jour avec succès  !', {timeOut: 3000})
                this.getListe()
            })
        }
     },
     created(){
        this.getListe()
        $('#expertiseTable').DataTable().destroy();
        $('#expertiseTable').DataTable({
            "aaSorting": []
        });

     },
     mounted() {
        this.initDataTable();
     },
     update() {
        $('#expertiseTable').DataTable().destroy();
        $('#expertiseTable').DataTable({
            "order": []
        });
     },
     watch: {
         abonnements: {
            handler() {
                // Détruisez et réinitialisez la DataTable lorsque abonnements change.
                $('#expertiseTable').DataTable().destroy();
                this.initDataTable();
            },
            deep: true // Pour observer les changements profonds dans abonnements.
         }
     }
 }
</script>


<style lang="scss" scoped>

</style>
