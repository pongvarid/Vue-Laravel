<!----------Make By YourName---------------->
<template>
    <div><br><br>
     <b-button  @click="em()" >empty</b-button>
        <b-button   @click="nl()" >null</b-button>
           <b-button   @click="st()" >set</b-button>
           <br><hr>
        <form @submit="checkForm">
            <h4>{{form.a}}</h4>
            <Input label="Name" icon="mdi mdi-cards-playing-outline" :def="form.a" cover="cover" v-model="form.a" :required="true" />
            <b-button type="submit" >Hello</b-button>
        </form>
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
                form: {
                    a:'ss',
                    b:'',
                    c:''
                },
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
            em(){
                this.form.a = ''
            },
            nl(){
                 this.form.a = null
            },
            st(){
                 this.form.a = 'Hello'
            },
            checkForm() {

            },
            /******* Methods default run ******/
            load: async function () {}
        },
    }
</script>


<style>
    .main {}

    .form-group .form-control {
        padding-left: 2.375rem;
    }

    .form-group .form-control-icon {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }
</style>