<template>
    <div>
        
    <!----    {{def}}
        {{select}} ---->

        <model-list-select v-model="seed"   :list="Object.values(select)"   
                     @input="onSelect()"
                     option-value="value"
                     option-text="name"
                     :placeholder="'Select '+cover" :isDisabled="disabled" >
  </model-list-select>
  
    </div>


</template>

<script>
	import { get } from "vuex-pathify"; 
    import _ from "lodash"
    import axios from 'axios'; 
 import { ModelListSelect     } from 'vue-search-select'
    export default {
        name: "Choice",
        components:{
        ModelListSelect
        },
        props: {
            
            name:String,
            disabled:false,
            def:String,
            cover:String,
         
        },
        data() {
            return {
                select:{},
                seed:null,
            }
        },
        async created() {},
        async mounted() {
            this.load(); 
        },
        computed:{
                _re:get('setting/getFind')
        },
        watch: {

        },
        methods: {

            onSelect(){
                this.$emit('input',this.seed);
            },
            
            load:async function(){
                       let load = await axios.get('/api/mbs/choice/'+this.name)
                        .then((r) => {
                            this.select = r.data
                            console.log('ChoiceTable Loading success', this.sel );
                        }).catch((e) => {
                            alert('ล้มเหลว')
                        });

                        if(this.def != ''){
                            this.seed = this.def;
                        }
                   
            }
        }
    }
</script>

<style scoped>

</style>