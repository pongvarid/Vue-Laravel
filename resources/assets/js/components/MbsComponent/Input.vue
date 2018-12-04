<!----------Make By YourName---------------->
<template>
 
<div>
 <span class="form-group has-float-label">
         <input v-if="date"   @change="onLoad()" v-model="input" type="date" class="form-control  inputx " :placeholder="cover"   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :required="required" 
         :disabled="disabled" >

           <input v-else-if="password"   @change="onLoad()" v-model="input" type="password" class="form-control inputx " :placeholder="cover"   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :required="required" 
         :disabled="disabled" >

        <input v-else-if="email"   @change="onLoad()" v-model="input" type="email" class="form-control inputx " :placeholder="cover"   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :required="required" 
         :disabled="disabled" >

   <input v-else-if="number"   @change="onLoad()" v-model="input" type="number" class="form-control inputx " :placeholder="cover"   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" :required="required" 
         :disabled="disabled" >

  
       <input v-else  @change="onLoad()" v-model="input" type="text" class="form-control bb inputx " :placeholder="cover"  
        aria-label="Sizing example input"  
        aria-describedby="inputGroup-sizing-default" :required="required" :disabled="disabled">
    
  <label class="fs14 mrt-4" style="background:white!important;"><span :class="icon"></span>&nbsp;{{label}} <span style="color:red;"><b>{{req()}}</b></span> </label>
</span>
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
            icon:'',
            def:'',
            date:false,
            password:false,
            email:false,
            number:false,
            required:false,
            disabled:false,
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
            req(){
                if(this.required){
                    return '*';
                }
            },
            onLoad(){
                 this.$emit('input', this.input);
            },
            /******* Methods default run ******/
            load: async function () {
                if(this.def != ''){
                    this.input = this.def;
                }
            }
        },
    }
</script>

<style>
    .inputx::placeholder{
            color:transparent;
        }

   /* .bb{
        border-radius: 0px;
        border-top:none!important;
        border-left:none!important;
        border-right:none!important;
    }
        .form-control:focus {
  border-color: #FF0000;
  outline: none;
}*/
</style>