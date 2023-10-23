<template>
    <div class="container" style="margin-top: 170px;">
        <h3 class="fw-bold text-secondary text-center">DECOUVREZ TOUTES NOS EXPERTISES</h3>
        <p class="text-center mb-5">Nous mettons à votre entière disposition nos savoirs faire dans divers domaines pour vous offrir des services de qualité.</p>
    </div>


    <div class="container-fluid d-flex justify-content-center  border mt-2" style=" padding : 130px 0; " v-for="expertise in expertises" :key="expertise.id">
        <div class="w-75">
            <div class="row d-flex align-items-center">
                <div data-aos="zoom-in-right" class="col-12 col-md-6 col-lg-5 aos-init aos-animate" v-if="expertise.id%2===0">
                    <img class="w-100" :src=" '/storage/'+expertise.photo" alt="world wide web image">
                </div>

                <div data-aos="zoom-in-left" class="col-12 col-md-6 col-lg-7 aos-init aos-animate ps-5">
                    <h3 class="text-secondary mb-5 text-uppercase">{{ expertise.titre }}</h3>
                    <p class="text_objectif ps-0">
                        {{ expertise.detail }}
                    </p>
                </div>

                <div data-aos="zoom-in-right" class="col-12 col-md-6 col-lg-5 aos-init aos-animate" v-if="expertise.id%2!==0">
                    <img class="w-100" :src=" '/storage/'+expertise.photo" alt="world wide web image">
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'Expertise',
        data() {
            return {
                expertises : []
            }
        },
        mounted(){
            this.getListe()
        },
        methods : {

            getListe(){
                this.$url.get('expertises', this.data).then(response => {

                this.expertises = response.data.data
                console.log(this.expertises)
                })
                .catch(function (error) {
                console.error(error);
                });
            },

        },
        filters: {
            french_date_format: function(value) {
                return moment(String(value)).format('DD/MM/YYYY HH:mm');
            },
        }
    }
</script>

<style lang="css" scoped>
    .text_objectif{
        font-size: 1.2rem;
        line-height: 30px;
    }
</style>
