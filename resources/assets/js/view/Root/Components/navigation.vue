<!----------Make By Pongvarid---------------->
<template>
     
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-outline-warning wh"><b>Mulberry</b></button>
  <button type="button" class="btn btn-secondary lnav-pop light"><b>#ROOT</b></button> 
</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
&nbsp; &nbsp; 
  <div class="collapse navbar-collapse  " id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" @click="$router.push('/root')">User Setting <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" @click="$router.push('/root/variable')">Varible Setting</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" @click="$router.push('/root/choice')" >Choice Setting</a>
      </li>
    </ul>

  </div>
   </div>

</nav>
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
            /******* Methods default run ******/
            load: async function () {}
        },
    }
</script>