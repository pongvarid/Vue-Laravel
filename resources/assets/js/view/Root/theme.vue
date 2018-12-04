<!----------Make By Pongvarid---------------->
<template>
    <div class="container-fulid">

        <navbar />
        <div class="container"><br><br>
            <div class='row'>
                <div class='col-12 '> 
                    <Theme />
                </div>  
            </div>
        </div>

      

    </div>
</template>

<script>
    import navbar from './Components/navigation'
    import Select from '../../components/DefaultComponent/Select'
    import Varible from './Components/Variable';
        import Theme from './Components/Theme'; 
    import {
        get
    } from "vuex-pathify"

    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            navbar,
            Select, 
            Varible,
            Theme, 
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

            onUserModal() {

            },
            offUserModeal() {

            }, 
            /******* Methods default run ******/
            load: async function () {

              

            }
        },
    }
</script>

<style>
    .bg {
        background: rgba(17, 17, 17, 1) !important;

    }

    .bordert {
        border-left: none;
        border-right: none;
        border-top: none;
        border-radius: 0px;
    }

    .bordert:focus {
        border-bottom-width: 2px;
        border-bottom-color: blue !important;
        box-shadow: none !important;

    }
</style>