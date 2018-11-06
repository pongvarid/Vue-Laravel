<template>
    <div>

     <!---   <select class="custom-select selectpicker" v-model="ccv"     @change="onChange()">
            <option v-for="Sel in v" :value="Sel.value">{{Sel.name}}</option>
        </select>  ---->

 

<model-list-select v-model="seed" :list="Object.values(v)"   
                     :on-change="onChange()"
                     option-value="name"
                     option-text="name"
                     placeholder="select item">
  </model-list-select>  

    </div>


</template>

<script>
	import { get } from "vuex-pathify"; 
    import _ from "lodash"
    import axios from 'axios'; 
import { ModelListSelect  } from 'vue-search-select'
    export default {
        name: "Choice",
        components:{
            ModelListSelect
        },
        props: {
            to: String,
            value: String,
            remark: String,
            name: String
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
            onChange() {
                this.convert(); 
                this.$emit('input', this.out);
            },

            select() {
                /* this.sel = [
                     {name: "ฮัลโหลเวอร์",value: '010110'},
                     {name: "สวัสดีโลก",value: '010120'},
                     {name: "ตายแล้วตัวแก",value: '010130'}
                 ]*/ 

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

                    let load = await axios.get('/api/mbs/choice')
                        .then((r) => {
                            this.sel = r.data
                        }).catch((e) => {
                            alert('ล้มเหลว')
                        });
                    this.cc = _.find(this.sel, {
                        'name': this.name,
                    }).type;
                    this.v = _.filter(this.sel, {
                        'type': this.cc,
                    });

                   /* if(this.value){
                        this.ccv = this.value;
                    }else{
                         this.ccv = null;
                    }*/

                },

        }
    }
</script>

<style scoped>

</style>