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
      Echo.channel("tasks-channel").listen("TasksEvent", (task) => {
        var user_id = 1; //default
        console.log('task.users_id:'+task.users_id+' / '+'user_id: '+user_id); //เอา event.user_id == user_id แสดง noti
        if(task.users_id == user_id){
          this.$vs.notify({
            title: "New Task: " + task.subject,
            text: task.due_date,
            color: "blue"
          });
        }
      });
    }
  }
};
</script>