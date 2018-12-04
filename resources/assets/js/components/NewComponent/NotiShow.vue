<!----------Make By YourName---------------->
<template>
  <alert
    :show.sync="showAlert"
    placement="top-right"
    :duration="2000"
    type="success"
    width="400px"
    dismissable
  >
    <strong>New User!!!</strong>
    <p>You successfully read this important alert message.</p>
  </alert>

  <!-- <alert v-model="showAlert" placement="top-right" duration="2000" type="info" width="400px" dismissable>
        <strong>Well Done!</strong>
        <p>You successfully read this important alert message.</p>
  </alert>-->
</template>

<script>
import { alert } from "vue-strap";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    alert
  },
  props: [],
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
      showAlert: false
    };
  },
  /*-------------------------Run Methods when Start this Page------------------------------------------*/
  mounted() {
    /**** Call loading methods*/
    this.load();
    this.noti();
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
    load: async function() {},
    noti: async function() {
      Echo.channel("noti-channel").listen("NotificationEvent", e => {
        console.log("notification run");
        this.$vs.notify({
          title: "New user.",
          text: "Lorem ipsum dolor sit amet, consectetur",
          color: "green"
        });
      });
    }
  }
};
</script>