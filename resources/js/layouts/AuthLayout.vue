<template>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="componentGoesHere">
            <slot/>
        </div>
        <div class="mt-5">
            <Footer></Footer>
        </div>
    </div>

</template>

<script>



import Header from '@/admin/Components/Header.vue';
import Sidebar from '@/admin/Components/Sidebar.vue';
import Footer from '@/admin/Components/Footer.vue';

export default {
    components: {
        Header, Footer, Sidebar
    },
    name: 'AuthLayout'

}
</script>

<style lang="css">

</style>
