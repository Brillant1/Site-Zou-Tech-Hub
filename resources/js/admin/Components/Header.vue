<template>
    <div class="nav-header">
        <router-link to="" class="brand-logo">
            <img class="logo-abbr" src="../../../../public/assets/images//logo-zth1.jpeg" alt="">
            <img class="logo-compact" src="../../../../public/assets/images//logo-zth1.jpeg" alt="">
            <img class="brand-title" src="../../../../public/assets/images//logo-zth1.jpeg" alt="">
        </router-link>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="search_bar dropdown">
                            <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                            <div class="dropdown-menu p-0 m-0">
                                <form>
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown notification_dropdown font-bold">
                            {{ user.name }}
                        </li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <img src="/assets/images/user.png" width="20" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ml-3">Profile </span>
                                </a>

                                <a @click.prevent="logout" class="dropdown-item ai-icon logout-btn">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span class="ml-3">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    import store from "@/store";
    export default {
        name: 'Header',
        data() {
            return {
                user: null
            }
        },
        methods: {
            logout(){
                this.$store.dispatch("user", null)
                this.$router.push('/login')
                // this.$url.post('logout').then( response=>{
                //     console.log(response)
                //     this.$store.dispatch("user", null)
                //     this.$router.push('/login')
                // })
            }
        },
        created(){
            this.user = store.getters.user
            console.log(this.user)
        }
    }
</script>

<style lang="css" scoped>
    .logout-btn:hover{
        cursor: pointer;
    }
</style>
