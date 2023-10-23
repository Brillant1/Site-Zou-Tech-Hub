<template>
    <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Ajouter une offre</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><router-link to="/admin/dashboard">dashboard</router-link></li>
                            <li class="breadcrumb-item active"><router-link to="/admin/offres/liste">Offres</router-link></li>
                            <li class="breadcrumb-item active"><router-link to="/admin/offres/liste">Ajouter offres</router-link></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<p class="card-title">Les champs masqués <span class="text-danger">(*)</span> sont obligatoires</p>
							</div>
							<div class="card-body">
                                <form action="#" method="POST" @submit.prevent="store" enctype="multipart/form-data">
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
												<input type="file" accept=".jpeg,.jpg,.png,.avif" class=" form-control"  ref="fileInput" @change="handleFileChange" required>
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
            </div>
        </div>
</template>

<script>
    import { useToastr } from '../../../toastr.js';
    const toastr = useToastr();
    export default {
        name: 'AjoutOffre',
        components:{

        },
        data() {
            return {
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

            store(){

                if(this.titre =="" || this.description =="" || this.can_submit==null || this.is_publish==null || this.photo=="" || this.debut_formation=="" || this.debut_formation=="" || this.fin_inscription==""){
                    alert('Veuillez bien remplir tous les champs du formulaire')
                }
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
                this.$url.post('offres',formData).then(response => {
                    console.log(response)
                    this.titre =""
                    this.description =""
                    this.is_publish =""
                    this.can_submit =""
                    this.$refs.fileInput.value=""
                    this.debut_inscription=""
                    this.fin_inscription=""
                    this.debut_formation=""
                    toastr.success('Offre ajoutée avec succès !', {timeOut: 3000})
                })
                .catch(function (error) {
                    console.error(error);
                });
            }
        }


    }
</script>

<style lang="scss" scoped>

</style>
