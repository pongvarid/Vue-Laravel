<!----------Make By YourName---------------->
 <template>
<div>
   <div class="card shadow-bl ">
                    <div class="card-header wh ldeep ">
                        Company List
                    </div>
                    <div class="container hg222">
                     
                    </div>
                </div>
    </div>
</template>

    <script>
        import { get } from "vuex-pathify"; 
   
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