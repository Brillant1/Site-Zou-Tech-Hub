<template>
    <!-- Header  -->
<nav class="navbar navbar-expand-md navbar-dark bg-white fixed-top justify-content-center shadow-lg">
    <div class="container p-md-0 d-flex header justify-content-between align-items-center">
      <a class="navbar-brand d-flex" href="">
        <div class="d-inline-flex">
            <img src="../../../public/assets/images/logo-zth1.jpeg" alt="" class="logo-header">
        </div>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <i v-if="hideIcon">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#ff8000"
                class="bi bi-x" viewBox="0 0 16 16">
                <path
                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
        </i>
        <i v-else>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ff8000"
                class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                <path
                    d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z" />
            </svg>
        </i>
      </button>
      <div class="collapse navbar-collapse bg-white">
        <ul class="navbar-nav me-auto mb-lg-2 mb-lg-0">
          <li class="nav-item">
            <router-link class="nav-link active pt-4" style="font-size : 16px" aria-current="page" to="/">ACCUEIL</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/expertises" class="nav-link pt-4" style="font-size : 16px">EXPERTISES</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/formations" class="nav-link pt-4" style="font-size : 16px">FORMATIONS</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/actualites" class="nav-link pt-4" style="font-size : 16px">ACTUALITES</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/offres" class="nav-link pt-4" style="font-size : 16px">OFFRES</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/offres" class="nav-link pt-4" style="font-size : 16px">CONTACT</router-link>
          </li>
        </ul>
      </div>
        <router-link to="/mediatheque" class="btn d-none d-md-block btn-success-zth br-30 font-bold  " id="btn-search" type="button">
            MEDIATHEQUE
        </router-link>
    </div>
    <div class="w-100 d-md-none bg-white">
      <div class="container p-0 collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-lg-2 mb-lg-0 pt-4">
            <li class="nav-item">
              <router-link class="nav-link {{ active_class(['/']) }}" aria-current="page" to="/">Accueil</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link {{ active_class(['/#about']) }}" to="/expertises">Expertises</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/formations">Formations</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/actualites">Actualités</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/offres">Offres</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/contact">Contact</router-link>
            </li>
             <li class="nav-item">
              <router-link class="nav-link " to="/contact">Notre médiathèque</router-link>
            </li>
        </ul>

      </div>
    </div>
</nav>

</template>

  <script>
    export default {
        data(){
            return {
                elementisChanged: null
            }
        },
        mounted(){

          this.elementisChanged = document.getElementById('navbarTogglerDemo03')

        },
        watch: {
            elementisChanged: {
                handler(newVal, oldVal){
                    if(newVal.classList.contains('show')){
                        return true
                    }
                    return false
                },
                deep: true
            }
        },
        computed: {
            hideIcon(){
                let element = document.getElementById('navbarTogglerDemo03')
                console.log(element)

                // if(element.classList.contains('show')){
                //    return true
                // }
                // return false
            }
        }

    }
</script>

<style lang="css" scoped>

</style>
