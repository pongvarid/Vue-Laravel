<!----------Make By YourName---------------->
 <template>
 <div class="container-fluid"><br>
      <div class='row'>
      <div class='col-12'>
       <b-card class="shadow-bl circle">
                    <div class='row'>
                        <div class='col-12'>
                            <h3 class="fs30"> <i class="mdi mdi-human-greeting fs60 w3-hide-small"></i>&nbsp;&nbsp;Agent</h3>
                        </div>
                        
                    </div>
                </b-card>
      </div>
      <div class='col-12'>
        <br>
          <AddAgent />
      </div>
      </div>
 </div>
</template>

    <script>
import AddAgent from "../components/NewComponent/Agent/AddAgent";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    AddAgent
  },
  /*-------------------------Set Component---------------------------------------*/
  props: {},
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {};
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