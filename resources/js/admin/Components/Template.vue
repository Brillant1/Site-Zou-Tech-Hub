<template>
     <div id="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>

        <div class="content-body">
            <div class="container-fluid">
                <router-view :key="$route.fullPath"></router-view>
            </div>
        </div>

        <Footer></Footer>
     </div>
</template>

<script>

import Header from './Header.vue'
import Footer from './Footer.vue'
import Sidebar from './Sidebar.vue'

export default {

}
</script>

<style lang="scss" scoped>

</style>
