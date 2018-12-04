<template>
    <div>

  
<model-list-select v-model="seed"   :list="Object.values(sel)"   
                     @input="dd()"
                     option-value="id"
                     option-text="name"
                     :placeholder="'Select '+cover" :isDisabled="disabled" >
  </model-list-select>  
 <br>
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
          table:'',
          def:'',
          cover:'',
          disabled:false,
        },
        data() {
            return {
                out:'',
                seed:'',
                ccv:'',
                sel: {},
                cc: {},
                v: {},
                value:'', 
            }
        },
        async created() {},
        async mounted() {
            this.load();
            this.select();
        },
        computed:{
                _re:get('setting/getFind')
        },
        watch: {

        },
        methods: {
            dd() {
               // this.convert();  
                console.log( this.seed);
                this.$emit('input', this.seed);
                
            },

            select() {
              

            },
            convert(){
                  let u =   this._re(this.seed);
                 try {
                   this.out =  u.value;
                } catch (error) {
                    this.out =  '';
              }
            },
            load: async function () { 
                    let load = await axios.get('/api/mbs/choice/table/'+this.table)
                        .then((r) => {
                            this.sel = r.data
                            console.log('ChoiceTable Loading success', this.sel );
                        }).catch((e) => {
                            alert('ล้มเหลว')
                        });
                    
                     if(this.def != ''){
                    this.seed = this.def;
                    console.log(this.def);
                    }
                     
                  

                },

        }
    }
</script>

<style scoped>

</style>