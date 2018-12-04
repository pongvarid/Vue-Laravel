<!----------Make By YourName---------------->
 <template>
<div class="container-fulid"><br><br><br>
    <h1>Web</h1>
     <b-button class="" @click="changeData()" >dd</b-button>
<DataTable  />
</div>
</template>

    <script>
import { get } from "vuex-pathify";
import DataTable from "../../components/MbsComponent/DataTable";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    DataTable
  },
  /*-------------------------Set Component---------------------------------------*/
  props: {},
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {  
      data: {}
    };
  },
  /*-------------------------Run Methods when Start this Page------------------------------------------*/
  async mounted() {
    /**** Call loading methods*/
    this.load();
  },
  /*-------------------------Run Methods when Start Routed------------------------------------------*/
  async beforeRouteEnter(to, from, next) {
    next();
  },
  /*-------------------------Vuex Methods and Couputed Methods------------------------------------------*/
  computed: {},
  /*-------------------------Methods------------------------------------------*/
  methods: {
    defaultData: async function() {
      let x = {
        url: "setting/company/branch"
      };
      this.data = await this.$store.dispatch("default/getData", x);
 
    },
 changeData: async function() {
                let x = {
                    url: 'mbs/table/multi/users'
                }
                this.data = await this.$store.dispatch('default/getData', x);
                console.log(this.data);
    },
    /******* Methods default run ******/
    load: async function() {
      this.defaultData();
    }
  }
};
</script>