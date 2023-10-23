<template>
     <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Ajout Média</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link to="/admin/dashoboard">Dashboard</router-link></li>
                        <li class="breadcrumb-item active"><router-link to="/admin/mediatheque">Média</router-link></li>
                        <li class="breadcrumb-item active"><router-link to="/admin/mediatheque/ajout">Ajout média</router-link></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ajout média  </h4>
                            <router-link to="/admin/mediatheque/ajout" class="btn btn-primary">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Liste médias</router-link>
                        </div>

                        <div class="card-body">
                            <form  action="#" method="POST" @submit.prevent="store" enctype="multipart/form-data" style="z-index: -100">

                                <select class=" form-select form-control-lg form-control  mb-3 " id="media_id" v-model="type_media" required>
                                    <option>Sélectionnez le type de média</option>
                                    <option value="video">Vidéo</option>
                                    <option value="photo">Photo</option>
                                </select>
                                <div class="input-group control-group increment">
                                    <input type="file" class="form-control mt-2" @change="handleFileChange" ref="fileInput">
                                    <div class="input-group-btn">
                                        <button class="btn btn-add" type="button" style="background: #178B01;"><i
                                                class="glyphicon glyphicon-plus">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-plus" viewBox="0 0 16 16">
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                            </i>
                                        </button>
                                    </div>
                                </div>

                                <div class="block2 hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <input type="file" class="form-control" @change="handleFileChange" ref="fileInput">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button"><i
                                                    class="glyphicon glyphicon-remove">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                      </svg>
                                                </i> </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center mt-3">
                                    <button type="reset" class="btn btn-light px-3">Annuler</button>
                                    <button type="submit" class="btn btn-primary px-3 ml-3">Enrégistrer</button>
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

import { useToastr } from '../../../toastr';
const toastr = useToastr();

    export default {
        name: 'AjoutMedia',
        data(){
            return {
                inputs : [1,2,3,4,5],
                photo :[],
                type_media: null
            }
        },
        methods : {
            handleFileChange(event){
                this.photo.push(event.target.files[0])
            },
            store(){
                const config = { headers: { "Content-Type": "multipart/form-data" } };
                const form = new FormData()
                console.log(this.photo.length)

                this.photo.forEach(element => {
                    form.append('type_media', this.type_media)
                    form.append('photo', element)
                    this.$url.post('medias', form).then(response => {
                    console.log(response)
                     this.$refs.fileInput.value = ''
                    })
                });
                toastr.success('Média ajouté avec succès !', {timeOut: 3000})







            }
        }
    }


    $(document).ready(function() {
        $(".btn-add").click(function() {
            var html = $(".block2").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").hide();
        });
    });

</script>

<style lang="scss" scoped>

</style>
