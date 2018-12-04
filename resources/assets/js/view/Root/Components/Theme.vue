<!----------Make By YourName---------------->
<template>
    <div>
        <div class="card shadow-bl  ">
            <div class="card-header wh ldeep fs18">
                <span class="mdi mdi-cookie"></span> &nbsp; Welcome Theme Setting
            </div>
            <div class="container pd-20">
                <h2>Theme Basic Setting</h2>
                <h4 class="fs18">Status : {{_mbs('theme')}}</h4><hr>
            
                <h2>Theme Drop Setting</h2>
                <h4 class="fs18">Status : {{_mbs('theme-drop')}}</h4><hr>

                <h2>Theme Iris Setting</h2>
                <h4 class="fs18">Status : {{_mbs('theme-iris')}}</h4><hr>

            </div>
        </div>

            

    </div>
</template>

<script>
    import {
        get
    } from "vuex-pathify";
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
            _mbs: get('setting/setValue'),
        },
        /*-------------------------Methods------------------------------------------*/
        methods: {
            /******* Methods default run ******/
            load: async function () {}
        },
    }
</script>