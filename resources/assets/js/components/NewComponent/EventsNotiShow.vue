<!----------Make By Net---------------->
<template>
 
</template>

<script>
import { alert } from "vue-strap";
import { get } from 'vuex-pathify';
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
  computed: {
    userData:get('Login/userData'),
  },
  /*-------------------------Methods------------------------------------------*/
  methods: {
    /******* Methods default run ******/
    load: async function() {
      //console.log(this.userData);
    },
    noti: async function() {
      Echo.channel("events-channel").listen("EventsEvent", (event) => {
        var user_id = 1; //default
        //console.log('event.users_id:'+event.users_id+' / '+'user_id: '+user_id); //เอา event.user_id == user_id แสดง noti
        if(event.users_id == user_id){
          this.$vs.notify({
            title: "New Event: " + event.subject,
            text: event.description + '<br>' + event.start + '-' + event.end,
            color: "green",
          });
        }
      });
    }
  }
};
</script>