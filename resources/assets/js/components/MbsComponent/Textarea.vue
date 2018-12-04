<!----------Make By YourName---------------->
<template>
     
  <div class="form-group">
    <label >{{label}}</label>
    <textarea v-model="input" @change="onLoad()"  style="resize: none;" class="form-control" rows="3" :required="required"></textarea>
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
            label:'',
            cover:'', 
            required:false,
        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                input:null,
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
            onLoad(){
                 this.$emit('input', this.input);
            },
            /******* Methods default run ******/
            load: async function () {}
        },
    }
</script>