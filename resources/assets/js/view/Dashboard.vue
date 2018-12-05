<!----------Make By YourName---------------->
<template>
    <div class="container"><br>
        <b-card class="shadow-bl circle">
            <div class='row'>
                <div class='col-12'>
                    <h3 class="fs30"> Dashboard</h3>
                </div>
                <NotiShow/>
                <tasksNotiShow/>
                <eventsNotiShow/>
            </div>
        </b-card>
    </div>
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