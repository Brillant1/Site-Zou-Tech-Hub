<template>
    <div class="content-body">
         <!-- row -->
         <div class="container-fluid">

             <div class="row page-titles mx-0">
                 <div class="col-sm-6 p-md-0">
                     <div class="welcome-text">
                         <h4>Toutes les formations</h4>
                     </div>
                 </div>
                 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><router-link to="/home">Dashbord</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/formations/liste">Formations</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/formations/liste">Liste des formations</router-link></li>
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
                                     <router-link to="/admin/formations/ajout" class="btn btn-primary">+ Ajouter un nouveau</router-link>
                                 </div>
                                 <div class="card-body">
                                     <div class="table-responsive">
                                         <table id="formationTable" class="display w-100">
                                             <thead>
                                                 <tr class="py-2">

                                                     <th>Photo</th>

                                                     <th>Titre</th>
                                                     <th>Description</th>
                                                     <th>Publié</th>
                                                     <th>Postulable</th>
                                                     <th>Actions</th>

                                                 </tr>
                                             </thead>
                                             <tbody>

                                                 <tr v-for="formation in formations" :key="formation.id">
                                                     <td><img class="" width="50" height="50" :src=" '/storage/'+formation.photo" alt=""></td>
                                                     <td>{{ formation.titre }}</td>
                                                     <td>{{ formation.description.length < 100?formation.description:formation.description.slice(0.100) + ' ...'}}</td>
                                                     <td>{{ formation.is_publish==1?"Oui":"Non" }}</td>
                                                     <td>{{ formation.can_submit==1?"Oui":"Non" }}</td>

                                                     <td>
                                                        <button @click="openModal(formation.id)" ref="modalLink" class="btn btn-sm btn-primary"  data-target=".bd-example-modal-lg"><i class="la la-pencil"></i></button>
                                                        <a class="btn btn-sm btn-danger ml-2" @click="supprimerFormation(formation.id)"><i class="la la-trash-o"></i></a>
                                                     </td>
                                                 </tr>
                                                 <div class="modal fade bd-example-modal-lg" ref="modalElement">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modification d'une formation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form @submit.prevent="updateFormation" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Intitulé de la formation<span class="text-danger">(*)</span> </label>
                                                                                <input type="text" class="form-control" v-model="titre" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Photo illustrative <span class="text-danger">(*)</span></label>
                                                                                <input type="file" accept=".jpeg,.jpg,.png,.avif" class=" form-control"  ref="fileInput" @change="handleFileChange">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <p>Voulez-vous poster cette formation <span class="text-danger">(*)</span></p>
                                                                            <div class="form-group">
                                                                                <label class="radio-inline">
                                                                                    <input type="radio" name="is_publish" value="1" v-model="is_publish"> Oui</label>
                                                                                <label class="radio-inline ml-3">
                                                                                    <input type="radio" name="is_publish" value="0" v-model="is_publish"> Non</label>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <p>Les intéressés peuvent-ils déjà postuler ? <span class="text-danger">(*)</span></p>
                                                                            <div class="form-group">
                                                                                <label class="radio-inline">
                                                                                    <input type="radio" name="can_submit" v-model="can_submit" value="1"> Oui</label>
                                                                                <label class="radio-inline ml-3">
                                                                                    <input type="radio" name="can_submit" v-model="can_submit" value="0"> Non</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Description de la formation <span class="text-danger">(*)</span></label>
                                                                                <textarea v-model="description" class="datepicker-default form-control" id="datepicker1" rows="10" required></textarea>
                                                                            </div>
                                                                        </div>

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
     name: 'ListeActualite',
     data() {
        return {
            formations: [],
            titre: '',
            description: '',
            photo:null,
            can_submit: null,
            is_publish: null
        }
     },
     methods: {
        handleFileChange(event) {
            this.photo = event.target.files[0];
        },
         initDataTable() {
             $('#formationTable').DataTable({
                 'order': [],
             });
         },

        getListe(){
            this.$url.get('formations', this.data).then(response => {

            this.formations = response.data.data
            })
            .catch(function (error) {
            console.error(error);
            });
        },
        supprimerFormation(id){

            if(confirm('Voulez-vous vraiment supprimer cette formation ?')){
                this.$url.delete('formations/'+id).then(response => {
                    console.log(response)
                    const index = this.formations.findIndex((a) => a.id === id);
                    if (index !== -1) {
                        this.formations.splice(index, 1);
                    }

                    toastr.success('Formation supprimée avec succès !', {timeOut: 3000})
                })
                .catch(function (error) {
                console.error(error);
                });
            }
        },
        openModal(id){
            this.$url.get('formations/'+id).then(response =>{

                let data = response.data.data
                this.titre = data.titre
                this.description = data.description

                this.formationId = data.id
                this.photo = data.photo
                this.is_publish = data.is_publish
                this.can_submit = data.can_submit
                let element = this.$refs.modalElement
                $(element).modal('show')
            })
        },

        updateFormation(){
            const config = { headers: { "Content-Type": "multipart/form-data" } };
            const formData = new FormData();
            formData.append('titre', this.titre)
            formData.append('description', this.description)
            formData.append('is_publish', this.is_publish)
            formData.append('can_submit', this.can_submit)
            formData.append('photo', this.photo)
            formData.append('formationId', this.formationId)
            console.log(formData)
            this.$url.post('formations/update', formData).then(response=>{
                console.log(response.data)
                let element = this.$refs.modalElement
                $(element).modal('hide')
                toastr.success('Formation mise à jour avec succès  !', {timeOut: 3000})
                this.getListe()
            })
        }
     },
     created(){
        this.getListe()
        $('#formationTable').DataTable().destroy();
        $('#formationTable').DataTable({
            "aaSorting": []
        });

     },
     mounted() {
        this.initDataTable();
     },
     update() {
        $('#formationTable').DataTable().destroy();
        $('#formationTable').DataTable({
            "order": []
        });
     },
     watch: {
         abonnements: {
            handler() {
                // Détruisez et réinitialisez la DataTable lorsque abonnements change.
                $('#formationTable').DataTable().destroy();
                this.initDataTable();
            },
            deep: true // Pour observer les changements profonds dans abonnements.
         }
     }
 }
</script>


<style lang="scss" scoped>

</style>
