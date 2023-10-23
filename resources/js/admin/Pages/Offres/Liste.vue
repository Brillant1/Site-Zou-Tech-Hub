<template>
    <div class="content-body">
         <!-- row -->
         <div class="container-fluid">

             <div class="row page-titles mx-0">
                 <div class="col-sm-6 p-md-0">
                     <div class="welcome-text">
                         <h4>Toutes les offres</h4>
                     </div>
                 </div>
                 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><router-link to="/home">Dashbord</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/offres/liste">Offres</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/offres/liste">Liste des offres</router-link></li>
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
                                     <router-link to="/admin/offres/ajout" class="btn btn-primary">+ Ajouter un nouveau</router-link>
                                 </div>
                                 <div class="card-body">
                                     <div class="table-responsive">
                                         <table id="offreTable" class="display w-100">
                                             <thead>
                                                 <tr class="py-2">
                                                     <th>Photo</th>
                                                     <th>Titre</th>
                                                     <th>Description</th>
                                                     <th>Debut insc</th>
                                                     <th>Fin insc</th>
                                                     <th>Date formation</th>
                                                     <th>Publié</th>
                                                     <th>Postulable</th>
                                                     <th>Actions</th>

                                                 </tr>
                                             </thead>
                                             <tbody>

                                                 <tr v-for="offre in offres" :key="offre.id">
                                                     <td><img class="" width="50" height="50" :src=" '/storage/'+offre.photo" alt=""></td>
                                                     <td>{{ offre.titre }}</td>
                                                     <td>
                                                        {{ offre.description.length < 100?offre.description:offre.description.slice(0,100) + ' ...'}}

                                                     </td>
                                                     <td>{{ formatDate(offre.debut_inscription) }}</td>
                                                     <td>{{ formatDate(offre.fin_inscription) }}</td>
                                                     <td>{{ formatDate(offre.debut_formation) }}</td>

                                                     <td>{{ offre.is_publish==1?"Oui":"Non" }}</td>
                                                     <td>{{ offre.can_submit==1?"Oui":"Non" }}</td>

                                                     <td>
                                                        <button @click="openModal(offre.id)" ref="modalLink" class="btn btn-sm btn-primary"  data-target=".bd-example-modal-lg"><i class="la la-pencil"></i></button>
                                                        <a class="btn btn-sm btn-danger ml-2" @click="supprimerOffre(offre.id)"><i class="la la-trash-o"></i></a>
                                                     </td>
                                                 </tr>
                                                 <div class="modal fade bd-example-modal-lg" ref="modalElement">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modification d'une offre</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="#" method="POST" @submit.prevent="updateOffre" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Intitulé de l'offre<span class="text-danger">(*)</span> </label>
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
                                                                            <div class="form-group">
                                                                                <label class="form-label">Début des inscriptions<span class="text-danger">(*)</span> </label>
                                                                                <input type="datetime-local" class="form-control" v-model="debut_inscription" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Fin des inscriptions <span class="text-danger">(*)</span></label>
                                                                                <input type="datetime-local" class=" form-control" v-model="fin_inscription"  required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Date de la formation <span class="text-danger">(*)</span></label>
                                                                                <input type="datetime-local" class=" form-control" v-model="debut_formation"  required>
                                                                            </div>
                                                                        </div>



                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <p>Voulez-vous poster cette offre <span class="text-danger">(*)</span></p>
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
                                                                                <label class="form-label">Description de l'offre <span class="text-danger">(*)</span></label>
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
            offres: [],
            titre: '',
            description: '',
            debut_inscription:'',
            debut_formation:'',
            fin_inscription:'',
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
            $('#offreTable').DataTable({
                'order': [],
            });
        },

        getListe(){
            this.$url.get('offres', this.data).then(response => {

            this.offres = response.data.data
            })
            .catch(function (error) {
            console.error(error);
            });
        },
        supprimerOffre(id){

            if(confirm('Voulez-vous vraiment supprimer cette offre ?')){
                this.$url.delete('offres/'+id).then(response => {
                    console.log(response)
                    const index = this.offres.findIndex((a) => a.id === id);
                    if (index !== -1) {
                        this.offres.splice(index, 1);
                    }

                    toastr.success('Offre supprimée avec succès !', {timeOut: 3000})
                })
                .catch(function (error) {
                console.error(error);
                });
            }
        },
        openModal(id){
            this.$url.get('offres/'+id).then(response =>{

                let data = response.data.data
                console.log(data)
                this.titre = data.titre
                this.description = data.description
                this.debut_inscription= data.debut_inscription
                this.debut_formation=data.debut_formation
                this.fin_inscription= data.fin_inscription
                this.offreId = data.id
                this.photo = data.photo
                this.is_publish = data.is_publish
                this.can_submit = data.can_submit
                let element = this.$refs.modalElement
                $(element).modal('show')
            })
        },

        updateOffre(){
            const config = { headers: { "Content-Type": "multipart/form-data" } };
            const formData = new FormData();
            formData.append('titre', this.titre)
            formData.append('description', this.description)
            formData.append('can_submit', this.can_submit)
            formData.append('is_publish', this.is_publish)
            formData.append('photo', this.photo)
            formData.append('debut_inscription', this.debut_inscription)
            formData.append('fin_inscription', this.fin_inscription)
            formData.append('debut_formation', this.debut_formation)
            formData.append('offreId', this.offreId)
            console.log(formData)
            this.$url.post('offres/update', formData).then(response=>{
                console.log(response.data)
                let element = this.$refs.modalElement
                $(element).modal('hide')
                toastr.success('Offre mise à jour avec succès  !', {timeOut: 3000})
                this.getListe()
            })
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
     created(){
        this.getListe()
        $('#offreTable').DataTable().destroy();
        $('#offreTable').DataTable({
            "aaSorting": []
        });

     },
     mounted() {
        this.initDataTable();
     },
     update() {
        $('#offreTable').DataTable().destroy();
        $('#offreTable').DataTable({
            "order": []
        });
     },
     watch: {
         abonnements: {
            handler() {
                // Détruisez et réinitialisez la DataTable lorsque abonnements change.
                $('#offreTable').DataTable().destroy();
                this.initDataTable();
            },
            deep: true // Pour observer les changements profonds dans abonnements.
         }
     }
 }
</script>


<style lang="scss" scoped>

</style>
