<template>
    <div class="dlabnav">
        <div class="dlabnav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <router-link to="/admin/dashboard" class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-home"></i>
                        <span class="nav-text font-bold">Dashboard</span>
                    </router-link>
                </li>

                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-user"></i>
                        <span class="nav-text font-bold">Actulaités</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><router-link to="/admin/actualites/liste">Liste</router-link></li>
                        <li><router-link to="/admin/actualites/ajout">Ajouter</router-link></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-users"></i>
                        <span class="nav-text font-bold">Expertises</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><router-link to="/admin/expertise/liste">Liste</router-link></li>
                        <li><router-link to="/admin/expertise/ajout">Ajouter</router-link></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-graduation-cap"></i>
                        <span class="nav-text font-bold">Formations</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><router-link to="/admin/formations/liste">Liste</router-link></li>
                        <li><router-link to="/admin/formations/ajout">Ajouter</router-link></li>
                    </ul>
                </li>


                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-graduation-cap"></i>
                        <span class="nav-text font-bold">Offres</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><router-link to="/admin/offres/liste">Liste</router-link></li>
                        <li><router-link to="/admin/offres/ajout">Ajouter</router-link></li>
                    </ul>
                </li>


                <li><router-link class="has-arrow" to="/admin/messages" aria-expanded="false">
                        <i class="la la-users"></i>
                        <span class="nav-text font-bold">Messages</span>
                    </router-link>
                </li>
                <li><router-link to="/admin/abonnements" class="has-arrow ai-icon" aria-expanded="false">
                        <i class="la la-signal"></i>
                        <span class="nav-text font-bold">Abonnements</span>
                    </router-link>

                </li>

                <!-- <li><router-link to="/admin/inscriptions" class="has-arrow"  aria-expanded="false">
                        <i class="la la-th-list"></i>
                        <span class="nav-text font-bold">Candidatures</span>
                    </router-link>
                </li> -->
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-graduation-cap"></i>
                        <span class="nav-text font-bold">Candidatures</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><router-link to="/admin/inscriptions">Nouvelles</router-link></li>
                        <li><router-link to="/admin/offres/ajout">Traitées</router-link></li>
                    </ul>
                </li>

                <li><router-link to="admin/mediatheque" class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-graduation-cap"></i>
                        <span class="nav-text font-bold">Médiathèque</span>
                    </router-link>
                    <ul>
                        <li><router-link to="/admin/mediatheque">Liste</router-link></li>
                        <li><router-link to="/admin/mediatheque/ajout">Ajouter</router-link></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

</script>

<style lang="scss" scoped>

</style>
