<template>

    <div>
        <Header></Header>

        <div class="componentGoesHere">
            <slot/>
        </div>
        <div class="mt-5">
            <Footer></Footer>
        </div>
    </div>

</template>
<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';

// import '../../../public/assets/site/js/bootstrap.min.js';
// import '../../../public/assets/site/js/owl.carousel.min.js';
// import '../../../public/assets/site/js/main.js';
//  import '../../../public/assets/site/js/aos.js';
// import 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js';


export default {
    components: {
        Header, Footer
    },
    name: 'GuestLayout',


}
</script>

<style lang="css">
    /* @import "../../../public/assets/site/css/bootstrap.min.css";
    @import "../../../public/assets/site/css/styles.css";
    @import "../../../public/assets/site/css/aos.css";
    @import "../../../public/assets/site/css/owl.carousel.min.css"; */
</style>
