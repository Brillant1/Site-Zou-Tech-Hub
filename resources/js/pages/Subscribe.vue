<template>
    <div >
      <div class="mt-5 d-flex flex-column justify-content-center align-items-center">

          <div class="d-flex mb-3 justify-content-between align-items-center container" style="margin-top:100px">
              <a @click="back()" style="cursor: pointer;" class="d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ff8000" class="bi bi-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                  </svg>
              </a>
              <p class="text-center h2 fw-bold text-uppercase ">Postuler à l'offre</p>
              <p></p>
          </div>



          <div class="shadow container p-4 details-container">
              <div class="">
                <p class="text-secondary-zth">Les champs marqués de <span class="text-danger">*</span> sont obligatoires</p>
                  <div class="d-flex flex-column mt-5">
                      <h3 class="rosette-text-green"></h3>
                      <div class=" d-flex justify-content-between mt-2">
                        <form @submit.prevent="store" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nom et prénom(s)<span class="text-danger">(*)</span> </label>
                                        <input type="text" class="form-control" v-model="nom" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Numero de téléphone<span class="text-danger">(*)</span></label>
                                        <input type="text" class="form-control" v-model="numero" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Adresse email</label>
                                        <input type="email" class="form-control" v-model="email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Adresse de résidence</label>
                                        <input type="text" class="form-control" v-model="adresse">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Profession actuelle</label>
                                        <input type="text" class="form-control" v-model="profession">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Votre CV<span class="text-danger">(*)</span></label>
                                        <input type="file" accept=".pdf, .docx" class=" form-control" ref="fileInput" @change="handleFileChange" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
                                    <button type="reset" class="btn btn-secondary px-3">Annuler</button>
                                    <button type="submit" class="btn btn-primary px-3 ms-3">Enrégistrer</button>
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
  import { useRoute } from 'vue-router'
  import { useToastr } from '@/toastr.js'
  let toastr = useToastr()
  export default {
      name:'Subscribe',
      data(){
        return{
            nom: '',
            numero: '',
            email: '',
            profession: '',
            adresse: '',
            cv: '',
            offreId: ''
        }
      },
      mounted(){
        const route = useRoute();
        let id = route.params
        this.offreId = id.id
        console.log(this.offreId)
      },

      methods: {
        handleFileChange(event) {
            this.cv = event.target.files[0];
        },

        store(){
            let form = new FormData()
            form.append('nom', this.nom)
            form.append('email', this.email)
            form.append('adresse', this.adresse)
            form.append('cv', this.cv)
            form.append('numero', this.numero)
            form.append('profession', this.profession)
            form.append('offreId', this.offreId)

            this.$url.post('subscribes', form).then(response =>{

                toastr.success('Merci pour votre candidature. Un retour vous sera fait sous peu')
                this.nom = ""
                this.email = ""
                this.adresse = ""
                this.cv = ""
                this.numero = ""
                this.profession = ""
                this.$refs.fileInput.value = ""
            })

        },
        back(){
            window.location.href = "/offreDetail/"+this.offreId;
        }
      },
    }
</script>

<style lang="css" scoped>
  .details-container{
      border-radius:20px;
  }
</style>
