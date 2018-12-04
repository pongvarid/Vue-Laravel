<!----------Make By YourName---------------->
 <template>
<div class="container">
    <div class="row"> 
    <div class="col-12 col-sm-6">
        <b-tabs>
        <b-tab title="Log A Call" >
            <LogACall />
        </b-tab>
        <b-tab title="New Task" >
            <Task />
        </b-tab>
        <b-tab title="New Event" active>
            <Event />
        </b-tab>
        </b-tabs>
    </div>
    <div class="col-12 col-sm-6">
        <Table />
    </div>
    </div>
</div>
</template>

    <script>
import LogACall from "./Activity/Logacall";
import Task from "./Activity/Task";
import Event from "./Activity/Event";
import AccountActivity from "./AccountActivity";
import Table from "./Activity/Table";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
      LogACall,
      Task,
      Event,
      Table
  },
  /*-------------------------Set Component---------------------------------------*/
  props: {},
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
        form: {},
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
    /******* Methods default run ******/
    load: async function() {}
  }
};
</script>