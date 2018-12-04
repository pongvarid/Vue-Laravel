<!----------Make By YourName---------------->
 <template>
<div>
<b-card no-body class="shadow-bl">
<b-tabs>
  <b-tab title="Information" >
    <AccountInformation />
  </b-tab>
  <b-tab title="Activity" >
    <br>
    <AccountActivity />
  </b-tab>
  <b-tab title="Notification" active>
    <br>
    <AccountNotification />
  </b-tab>
</b-tabs>
</b-card>
    </div>

</template>

    <script>
import AccountInformation from "./AccountInformation";
import AccountActivity from "./AccountActivity";
import AccountNotification from "./AccountNotification";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
      AccountInformation,
      AccountActivity,
      AccountNotification
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