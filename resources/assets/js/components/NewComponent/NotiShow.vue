<!----------Make By Net---------------->
<template>

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
      Echo.channel('noti-channel').listen("NotificationEvent", (user) => {
        console.log('noti test');
        this.$vs.notify({
          title: "Notification test",
          text: "Notification test",
          color: "green"
        });
      });
    }
  }
};
</script>