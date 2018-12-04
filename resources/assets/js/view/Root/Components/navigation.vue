<!----------Make By Pongvarid---------------->
<template>

  <b-navbar toggleable="md" type="dark"  class="ldeep">
    <b-container> 

    <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

    <b-navbar-brand href="#">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-outline-warning wh"><b>Mulberry</b></button>
        <button type="button" class="btn btn-secondary lpop bl"><b>#ROOT</b></button>
      </div>
    </b-navbar-brand>

    <b-collapse is-nav id="nav_collapse">

      <b-navbar-nav> 
        <b-nav-item @click="$router.push('/root')" active href="#"><span class="mdi mdi-account"></span>&nbsp;User</b-nav-item>
        <b-nav-item  @click="$router.push('/root/variable')" active href="#"><span class="mdi mdi-database"></span>&nbsp;Varible</b-nav-item>
        <b-nav-item @click="$router.push('/root/choice')" active href="#"><span class="mdi mdi-menu"></span>&nbsp;Choice</b-nav-item>
        <b-nav-item @click="$router.push('/root/theme')"  active href="#"><span class="mdi mdi-cookie"></span>&nbsp;Theme</b-nav-item>
      </b-navbar-nav> 
        <b-navbar-nav class="ml-auto">
         <b-nav-item @click="back()"  active href="#"><span class="mdi mdi-backup-restore"></span>&nbsp;<b>Back to your Website</b></b-nav-item>
      
        </b-navbar-nav>
    </b-collapse>

    </b-container>
  </b-navbar>

</template>

<script>
  export default {
    name: 'Root',
    /*-------------------------Load Component---------------------------------------*/
    components: {

    },
    /*-------------------------Set Component---------------------------------------*/
    props: {

    },
    /*-------------------------DataVarible---------------------------------------*/
    data() {
      return {

      };
    },
    /*-------------------------Run Methods when Start this Page------------------------------------------*/
    async mounted() {
      /**** Call loading methods*/
      this.load();
    },
    /*-------------------------Run Methods when Start Routed------------------------------------------*/
    async beforeRouteEnter(to, from, next) {
      next()
    },
    /*-------------------------Vuex Methods and Couputed Methods------------------------------------------*/
    computed: {

    },
    /*-------------------------Methods------------------------------------------*/
    methods: {
      back(){
        this.$router.push('/');
        location.reload();
      },
      /******* Methods default run ******/
      load: async function () {}
    },
  }
</script>