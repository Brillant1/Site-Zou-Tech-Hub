<template>
    <!-- Hero page section -->
    <section class="">
        <div id="caroussel-wtn" style=" margin-top : 100px;" class="container carousel  pb-0 mb-1 carousel-dark slide"
            data-bs-ride="carousel">
            <div class="row carousel-inner">
                <div class="col-md-12">
                    <div class="carousel-item active " data-bs-interval="1000000">
                        <div class="container-fluid d-flex">
                            <div class="carousel-content">
                                <h3 class="carousel-title text-secondary ">Nous vous rendons des services digitaux de qualité pour maximiser votre efficacité et avoir un gain de temps.
                                </h3>
                                <p class="carousel-text">
                                </p>
                                <div class="d-flex pe-0 pe-lg-5   mt-50">
                                    <a href="#" class="btn btn-primary-zth br-30 flex-fill font-bold">
                                        Nous découvrir
                                    </a>
                                    <router-link to="/contact"
                                        class="btn btn-outline-primary-zth br-30 ms-2 flex-fill font-bold">
                                        Contactez-nous
                                    </router-link>
                                </div>
                            </div>
                            <div class="align-self-top ">
                                <img src="assets/images/img-hero1.png" alt="" class="carousel-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section à propos -->
    <section class="">
        <div class="container">
            <h1 data-aos="fade-up" class="text-center text-secondary mt-5 aos-init aos-animate">
                NOTRE RAISON D'ÊTRE
                <svg fill="#0891a4" viewBox="0 200 744.09 30">
                    <g>
                        <path d="m358.57 218.22c4.3635-0.63392 3.5955-6.61 0-7.3393-34.106 3.3914-69.127 2.3193-104.45 3.7983 35.154 1.5334 69.298-0.57635 104.45 3.541z"></path>
                        <path d="m378.21 215.04c0 2.2683-1.9188 4.1071-4.2857 4.1071s-4.2857-1.8388-4.2857-4.1071 1.9188-4.1072 4.2857-4.1072 4.2857 1.8388 4.2857 4.1072z"></path>
                        <path d="m387.11 218.22c-4.3635-0.63392-3.5955-6.61 0-7.3393 34.106 3.3914 69.127 2.3193 104.45 3.7983-35.154 1.5334-69.298-0.57635-104.45 3.541z"></path>
                    </g>
                </svg>
            </h1>
            <div class="row d-flex align-items-center">
                <div data-aos="zoom-in-right" class="col-12 col-md-6 col-lg-5 aos-init aos-animate">
                    <img class="w-100" src="assets/images/globe.png" alt="world wide web image">
                </div>
                <div data-aos="zoom-in-left" class="col-12 col-md-6 col-lg-7 aos-init aos-animate">
                    <p class="text_objectif ">
                        Promouvoir un écosystème digital solide, dynamique et collaboratif dans le ZOU au Bénin et en Afrique à travers l'éducation numérique, la formation et l'ingénierie de conception et de vente de
                        solutions digitales utiles et vertueuses au service des entreprises (publiques et privées)
                        et de la communautés en général afin de contribuer à l'accélération de la transformation digitale des entreprises et à la réduction du retard numérique, de la cybercriminalité et du chômage des jeunes.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Nos expertises -->
    <section class="">
        <div class="container">
            <h1 data-aos="fade-up" class="text-center text-secondary mt-5 aos-init aos-animate">
                LES SERVICES QUE NOUS RENDONS
                <svg fill="#0891a4" viewBox="0 200 744.09 30">
                    <g>
                        <path d="m358.57 218.22c4.3635-0.63392 3.5955-6.61 0-7.3393-34.106 3.3914-69.127 2.3193-104.45 3.7983 35.154 1.5334 69.298-0.57635 104.45 3.541z"></path>
                        <path d="m378.21 215.04c0 2.2683-1.9188 4.1071-4.2857 4.1071s-4.2857-1.8388-4.2857-4.1071 1.9188-4.1072 4.2857-4.1072 4.2857 1.8388 4.2857 4.1072z"></path>
                        <path d="m387.11 218.22c-4.3635-0.63392-3.5955-6.61 0-7.3393 34.106 3.3914 69.127 2.3193 104.45 3.7983-35.154 1.5334-69.298-0.57635-104.45 3.541z"></path>
                    </g>
                </svg>
            </h1>
            <div class="row d-flex align-items-center">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> -->
                    <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button> -->
                    <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item" :class="{ 'active':index===0 }" data-bs-interval="6000" v-for="(expertise, index) in expertises.length" :key="index">
                        <div class="row justify-content-start">

                            <div class="col-lg-4 col-md-6  col-sm-12 mt-md-4" v-for="(expert, index) in expertises[index]" :key="index">
                                <div class="card h-100 border-0">

                                        <img :src=" '/storage/'+expert.photo" class="card-img-top"
                                            alt="..." style=" height:250px; width:100%; ">

                                    <div class="card-body ps-0">
                                        <h4 class="card-title font-bold fs-5 rosette-text-orange text-center text-uppercase">
                                            {{ expert.titre }}
                                        </h4>
                                        <p class="card-text mt-3 title-activity-content text-justify">
                                            {{ expert.detail.length < 300?expert.detail:expert.detail.slice(0,300) + ' ...'}}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                </div>
            </div>
            <div class=" mt-5 d-flex justify-content-center">
                <router-link to="/expertises" class="btn btn-outline-primary-zth br-30 ms-2 px-5 mt-3 fs-5">Découvrir tous nos services</router-link>
            </div>
        </div>
    </section>

    <!-- Section formation -->
    <section class="">
        <div class="container">
            <h1 data-aos="fade-up" class="text-center text-secondary mt-5 aos-init aos-animate">
                NOS FORMATIONS
                <svg fill="#0891a4" viewBox="0 200 744.09 30">
                    <g>
                        <path d="m358.57 218.22c4.3635-0.63392 3.5955-6.61 0-7.3393-34.106 3.3914-69.127 2.3193-104.45 3.7983 35.154 1.5334 69.298-0.57635 104.45 3.541z"></path>
                        <path d="m378.21 215.04c0 2.2683-1.9188 4.1071-4.2857 4.1071s-4.2857-1.8388-4.2857-4.1071 1.9188-4.1072 4.2857-4.1072 4.2857 1.8388 4.2857 4.1072z"></path>
                        <path d="m387.11 218.22c-4.3635-0.63392-3.5955-6.61 0-7.3393 34.106 3.3914 69.127 2.3193 104.45 3.7983-35.154 1.5334-69.298-0.57635-104.45 3.541z"></path>
                    </g>
                </svg>
            </h1>
            <div class="row d-flex align-items-center">
                <div class="row justify-content-start">
                    <div class="col-lg-4 col-md-6  col-sm-12 mt-md-4" v-for="(formation, index) in formations" :key="formation.id">
                        <div class="card h-100 border-0 shadow rounded p-3">
                                <img :src=" '/storage/'+formation.photo" class="card-img-top"
                                    alt="..." style=" height:250px; width:100%; ">

                            <div class="card-body ps-0">
                                <h4 class="card-title fs-5 rosette-text-orange text-center text-uppercase font-bold">
                                    {{ formation.titre }}
                                </h4>
                                <p class="card-text mt-3 title-activity-content text-justify ">
                                    {{ formation.description.length < 300?formation.description:formation.description.slice(0,300) + ' ...'}}
                                </p>
                            </div>
                            <div class=" d-flex justify-content-end">
                                <router-link :to="{name: 'formationDetail', params: {id: formation.id}}"  class="btn btn-submit float-right text-white waves-effect waves-light">Lire la suite
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </router-link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class=" mt-5 d-flex justify-content-center">
                <router-link to="/formations" class="btn btn-outline-primary-zth br-30 ms-2 px-5 mt-3 fs-5">Explorer toutes nos formations</router-link>
            </div>
        </div>
    </section>
</template>

<script>
    export default{
        name: 'Home',
        data() {
            return {
                formations : [],
                expertises : [],
                actualites : [],
            }
        },
        mounted(){
            this.getListeActualite();
        },
        methods : {
            getListeActualite(){
                this.$url.get('home_data').then(response => {
                    this.formations = response.data.formations
                    this.expertises = response.data.expertises
                    this.actualites = response.data.actualites
                    console.log(this.formations)
                })
            },

        },
        filters: {
            limiterCaracteres(texte, limite) {
                if (texte.length > limite) {
                    return texte.slice(0, limite) + "...";
                }
                return texte;
            }
        }
    }
</script>

<style lang="css" scoped>
    .text_objectif{
        font-size: 1.2rem;
    }
</style>
