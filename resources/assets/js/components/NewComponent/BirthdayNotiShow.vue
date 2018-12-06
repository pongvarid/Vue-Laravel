<!----------Make By Net---------------->
<template>
 
</template>

<script>
var moment = require('moment');
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
      Echo.channel("birthday-channel").listen("BirthdayEvent", (data) => {
        var user_id = 1; //default

        var birthday = moment(data.birthday);
        var today = moment().format("YYYY-MM-DD");
        var age = moment(today).diff(birthday, 'years');
        var nextBirthday = moment(birthday).add(age, 'years');
 
        if(data.users_id == user_id){
            if (nextBirthday.isSame(today)) {
                //console.log('Cake!!');
            }else {
                nextBirthday = moment(birthday).add(age + 1, 'years');
                var day = nextBirthday.diff(today, 'days');
                //console.log(day);
                if(day > 0 && day < 3){
                    this.$vs.notify({
                        title: "HBD: "+data.fullname+"<br>",
                        text: day+' Days',
                        color: "orange",
                    });
                }else if(day == 0){
                    this.$vs.notify({
                        title: "HBD: "+data.fullname+"<br>",
                        text: 'Age: '+age,
                        color: "red",
                    });
                }
            }
        }
        
      });
    }
  }
};
</script>