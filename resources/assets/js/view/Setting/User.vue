<!----------Make By YourName---------------->
<template>
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col-12">
                <b-card class="shadow-bl circle">
                    <div class='row'>
                        <div class='col-12'>
                            <h3 class="fs30"> <i class="mdi mdi-account fs60 w3-hide-small"></i>&nbsp;&nbsp;User
                                Setting</h3>
                        </div>

                    </div>
                </b-card>
            </div>

            <div class="col-sm-12 mrt-30"> 
               
                        <UserCore />
            
            </div> 

    
        </div>
        <br><br>


        
    </div>

</template>

<script>
    import {
        get
    } from "vuex-pathify";

    import UserCore from '../../components/NewComponent/Setting/User/UserCore';
    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            UserCore
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