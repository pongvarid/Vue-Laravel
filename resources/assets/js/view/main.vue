<!----------Make By YourName---------------->
<template>
    <div> 
        <div class="container"><br><br><br>
            <h2>Helllo</h2><hr>
        
            
                <div class="card shadow-bl  ">
                    <div :class="'card-header wh ' + _mbs('navbar')">
                        User Data
                    </div>
                    <div class="container pd-20">
                            <pre>{{User}}</pre>
                    </div>
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
            User:get("Login/userData"),
                 _mbs: get("setting/setValue"),
        },
        /*-------------------------Methods------------------------------------------*/
        methods: {
         
            /******* Methods default run ******/
            load: async function () {
                  
                    history.pushState(null, null, location.href);
                            window.onpopstate = function () {
                                location.reload();
                     };
            }
        },
    }
</script>