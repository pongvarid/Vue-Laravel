<!----------Make By YourName---------------->
<template>
    <div class="container-fluid"><br>
        <div class="row">

            <div class="col-12">
                <b-card class="shadow-bl circle">
                    <div class='row'>
                        <div class='col-12'>
                            <h3 class="fs30"> <i class="mdi mdi-office-building fs60 w3-hide-small"></i>&nbsp;&nbsp;Company Setting</h3>
                        </div>
                        
                    </div>
                </b-card>
            </div>

            <div class="col-md-5 col-12 mrt-30">
                <MyCompany />
            </div>

            <div class="col-md-7 col-12 mrt-30">
                 <AddCompany   />
            </div>

        </div>
        <br><br>
    </div>
</template>

<script>
    import {
        get
    } from "vuex-pathify";

    import AddCompany from '../../components/NewComponent/Setting/Company/AddCompany';
    import ListCompany from '../../components/NewComponent/Setting/Company/CompanyList';
    import MyCompany from '../../components/NewComponent/Setting/Company/MyCompany.vue';
    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            AddCompany,
            ListCompany,
            MyCompany
        },
        /*-------------------------Set Component---------------------------------------*/
        props: {

        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                time: '',
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