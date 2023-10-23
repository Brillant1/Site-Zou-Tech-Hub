<template>
    <main>
        <component :is="currentLayout">
            <router-view></router-view>
        </component>
    </main>
 </template>
<script>


import { useRoute } from 'vue-router';


export default {

  name: "App",

  data() {
    return {
      currentLayout: ''
    };
  },
  beforeMounted(){
    const route = useRoute();

    this.currentLayout = route.meta.layout;

    if(localStorage.getItem('user'))
    {
        this.$store.dispatch("user", {
        user: localStorage.getItem('user')
        })
    }
    this.loadScriptsForLayout(this.currentLayout);

  },
  methods: {
    loadScriptsForLayout(layout){

        if (layout === 'guest-layout') {
            import('../../public/assets/site/js/aos.js')
            import('../../public/assets/site/js/bootstrap.min.js')
            import('../../public/assets/site/js/main.js')
            import('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')
            import('https://unpkg.com/aos@2.3.1/dist/aos.js')
        }
    }
  },


  watch: {
    $route(to, from) {
        this.currentLayout = to.meta.layout
    }
  },

};
</script>


 <style lang="scss" scoped>

 </style>
