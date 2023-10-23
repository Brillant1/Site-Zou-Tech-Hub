<template>
    <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Ajouter une actualité</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><router-link to="/admin/actualites/liste">Actualités</router-link></li>
                            <li class="breadcrumb-item active"><router-link to="/admin/actualites/ajout">Ajouter actualité</router-link></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<p class="card-title text-lowercase">Les champs masqués <span class="text-danger">(*)</span> sont obligatoires</p>
							</div>
							<div class="card-body">
                                <form action="#" method="POST" @submit.prevent="store" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Titre de l'actualité  <span class="text-danger">(*)</span> </label>
												<input type="text" class="form-control" v-model="titre" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date de publication <span class="text-danger">(*)</span></label>
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
												<label class="form-label">Photo illustrative <span class="text-danger">(*)</span></label>
												<input type="file" accept=".jpeg,.jpg,.png,.avif" class=" form-control"  ref="fileInput" @change="handleFileChange" required>
											</div>
										</div>



										<div class="col-12">
											<div class="form-group">
												<label class="form-label">Détail de l'actualité <span class="text-danger">(*)</span></label>
												<textarea v-model="detail" class="datepicker-default form-control" id="datepicker1" rows="10" required></textarea>
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
        name: 'AjoutActualite',
        components:{

        },
        data() {
            return {
                titre: '',
                date:'',
                detail: '',
                photo:null,
                domaine:''
            }
        },
        methods: {

            handleFileChange(event) {
                this.photo = event.target.files[0];
            },

            store(){
                const config = { headers: { "Content-Type": "multipart/form-data" } };
                const formData = new FormData();
                formData.append('titre', this.titre)
                formData.append('date', this.date)
                formData.append('domaine', this.domaine)
                formData.append('detail', this.detail)
                formData.append('photo', this.photo)
                this.$url.post('actualites',formData).then(response => {
                    console.log(response)
                    this.titre =""
                    this.date =""
                    this.detail =""

                    this.domaine =""
                    this.$refs.fileInput.value=""
                    toastr.success('Actualité ajoutée avec succès !', {timeOut: 3000})
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
