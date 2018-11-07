<!----------Make By YourName---------------->
 <template>
<div>
   <div class="card shadow-bl  ">
                    <div class="card-header wh ldeep">
                        Company Data Management
                    </div>
                    <div class="container pd-20">
                        <center><img class="round-full wd150 hg150" src="http://www.three.co.uk/hub/wp-content/uploads/Google-logo-1-resized.jpg"
                                alt=""></center>
                           
                                 <center> <h2>Google Co.ld</h2>
                                  <hr></center>
                                     <div class="mrl-20">
                                  <h4 class="fs18"><b>Company ID :</b>&nbsp; 234556</h4>
                                  <h4 class="fs18"><b>Business Type :</b>&nbsp; Search Engineer</h4>
                                  <h4 class="fs18"><b>Establish :</b>&nbsp; 12/02/1992</h4> 
                                  <h4 class="fs18"><b>Currency :</b>&nbsp; Dolla </h4> 
                                  <hr>
                              </div>
                    </div>
                </div>
    </div>
</template>

    <script>
export default {
    name: 'Root',
    /*-------------------------Load Component---------------------------------------*/
    components: {

    },
  /*-------------------------Set Component---------------------------------------*/
props:{

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
    computed:{

},
    /*-------------------------Methods------------------------------------------*/
methods:{
    /******* Methods default run ******/
    load:async function(){
}
},
    }
</script>