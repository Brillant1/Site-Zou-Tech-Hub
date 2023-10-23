<template>
    <div class="content-body">
         <!-- row -->
         <div class="container-fluid">

             <div class="row page-titles mx-0">
                 <div class="col-sm-6 p-md-0">
                     <div class="welcome-text">
                         <h4>Messages des utilisateurs</h4>
                     </div>
                 </div>
                 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><router-link to="/home">Dashbord</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/actualites/liste">Messages</router-link></li>
                         <li class="breadcrumb-item active"><router-link to="/admin/actualites/liste">Liste des messages</router-link></li>
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
                                         <table id="messageTable" class="display w-100">
                                             <thead>
                                                 <tr class="py-2">

                                                     <th>Date</th>
                                                     <th>Email</th>
                                                     <th>Téléphone</th>
                                                     <th>Sujet</th>
                                                     <th>Message</th>
                                                     <th>Actions</th>

                                                 </tr>
                                             </thead>
                                             <tbody>

                                                 <tr v-for="message in messages" :key="message.id">
                                                     <td>{{ formatDate( message.created_at) }}</td>
                                                     <td>{{ message.email }}</td>
                                                     <td>{{ message.numero }}</td>
                                                     <td>{{ message.sujet }}</td>
                                                     <td>
                                                        {{ message.message.length < 100?message.message:message.message.slice(0,100) + ' ...'}}

                                                     </td>

                                                     <td>
                                                        <button @click="openModal(message.id)" ref="modalLink" class="btn btn-sm btn-primary"  data-target=".bd-example-modal-lg"><i class="la la-pencil"></i></button>
                                                        <a class="btn btn-sm btn-danger ml-2" @click="supprimerMessage(message.id)"><i class="la la-trash-o"></i></a>
                                                     </td>
                                                 </tr>
                                                 <div class="modal fade bd-example-modal-lg" ref="modalElement">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Détail sur le message</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

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
     name: 'ListeMessage',
     data() {
        return {
            messages: [],
            nom: "",
            email: "",
            numero: "",
            message: "",
            sujet: "",
        }
     },
    methods: {

        initDataTable() {
            $('#messageTable').DataTable({
                'order': [],
            });
        },

        getListe(){
            axios.get('http://127.0.0.1:8000/api/messages').then(response => {

            this.messages = response.data.data
            })
            .catch(function (error) {
            console.error(error);
            });
        },

        supprimerMessage(id){

            if(confirm('Voulez-vous vraiment supprimer ce message ?')){
                axios.delete('http://127.0.0.1:8000/api/messages/'+id).then(response => {
                    console.log(response)
                    const index = this.messages.findIndex((a) => a.id === id);
                    if (index !== -1) {
                        this.messages.splice(index, 1);
                    }

                    toastr.success('Message supprimée avec succès !', {timeOut: 3000})
                })
                .catch(function (error) {
                console.error(error);
                });
            }
        },

        openModal(id){
            axios.get('http://127.0.0.1:8000/api/messages/'+id).then(response =>{

                let data = response.data.data
                this.nom = data.nom
                this.email = data.email
                this.numero = data.numero
                this.sujet = data.sujet
                this.message = data.message
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
        }

    },
    created(){
        this.getListe()
        $('#messageTable').DataTable().destroy();
        $('#messageTable').DataTable({
        "aaSorting": []
    });

    },
    mounted() {
        this.initDataTable();
    },
    update() {
        $('#messageTable').DataTable().destroy();
        $('#messageTable').DataTable({
            "order": []
        });
    },
    watch: {
        abonnements: {
        handler() {
            // Détruisez et réinitialisez la DataTable lorsque abonnements change.
            $('#messageTable').DataTable().destroy();
            this.initDataTable();
        },
        deep: true // Pour observer les changements profonds dans abonnements.
        }
    }
 }
</script>


<style lang="scss" scoped>

</style>
