<template lang="html">

    <div id="parentx">
        <vs-navbar   class=" lblue" style="   z-index: -1;">
            <vs-button type="flat"   icon="menu"></vs-button>

            <vs-spacer></vs-spacer>

            <vs-navbar-item index="0">
                <a href="#"> <img class="hg40" src="@a/image/ver.png" /> </a>
            </vs-navbar-item>

        </vs-navbar>
        <vs-sidebar  v-if="navbar"  :reduce="reduce" :reduce-not-hover-expand="notExpand" parent="body" default-index="1" class=" lblue"
            spacer v-model="active">
            <div class="header-sidebar" slot="header">
              
                <center>
                    <vs-avatar @click="$router.push('/profile')" size="70px" :src="getImge(userData)" />
                </center>
            </div>

 

        <vs-sidebar-item @click=" change('/','0')" :class="checkRouter(0)"  index="0" icon="dashboard">
                &nbsp;Dashboard
        </vs-sidebar-item>
        <vs-sidebar-item @click=" change('/lead','4')" :class="checkRouter(4)"  index="4" icon="info">
                &nbsp;Lead
        </vs-sidebar-item>
        <vs-sidebar-item @click=" change('/agent','5')" :class="checkRouter(5)"  index="5" icon="assignment_ind">
                &nbsp;Agent
        </vs-sidebar-item>
        <vs-sidebar-item @click=" change('/supplier','6')" :class="checkRouter(6)"  index="6" icon="wc">
                &nbsp;Supplier
        </vs-sidebar-item>
        <vs-sidebar-item @click=" change('/operation','7')" :class="checkRouter(7)"  index="7" icon="line_style">
                &nbsp;Operation
        </vs-sidebar-item>
        <vs-sidebar-item @click=" change('/account','8')" :class="checkRouter(8)"  index="8" icon="accessibility">
                &nbsp;Account
        </vs-sidebar-item>
        <vs-sidebar-item @click=" change('/contact','9')" :class="checkRouter(9)"  index="9" icon="featured_play_list">
                &nbsp;Contact
        </vs-sidebar-item>
        <vs-sidebar-item @click=" change('/opportunity','10')" :class="checkRouter(10)"  index="10" icon="public">
                &nbsp;Opportunity
        </vs-sidebar-item>
        <vs-sidebar-item @click=" change('/product','3')" :class="checkRouter(3)"  index="3" icon="store">
                &nbsp;Product
        </vs-sidebar-item>
         <vs-sidebar-item @click=" change('/prediction','11')" :class="checkRouter(11)"  index="11" icon="ondemand_video">
                &nbsp;Prediction
        </vs-sidebar-item>

            <vs-sidebar-item @click="change('/setting/user','1')" :class="checkRouter(1)" index="1" icon="person">
             &nbsp; &nbsp;User Setting
            </vs-sidebar-item>

              <vs-sidebar-item @click="change('/setting/company','2')"  :class="checkRouter(2)" index="2" icon="location_city">
               &nbsp;&nbsp;Company Setting
            </vs-sidebar-item>

            <div class="footer-sidebar" slot="footer">
              <vs-sidebar-item @click=" change('/logout','99')" class="lnot wh fs22" index="99" icon="subdirectory_arrow_right">
                Logout
            </vs-sidebar-item>
            </div>

        </vs-sidebar>
    </div>

</template>

<script>
import { get } from "vuex-pathify";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {},
  /*-------------------------Set Component---------------------------------------*/
  props: {},
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
      page: 0,
      active: true,
      notExpand: false,
      reduce: true,
      activeItem: true,
      login: true
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
  computed: {
    navbar:get('navbar/slide'),
    userData: get("Login,userData"),
    _mbs: get("setting/setValue"),
    getToken: get("Login/userToken")
  },
  /*-------------------------Methods------------------------------------------*/
  methods: {
    navbarChange(){

    },
    getImge(img) {
      let user = JSON.parse(JSON.stringify(img));
      try {
        let img_user = user.user.img_user;
        return img_user;
      } catch (e) {}
    },
    checkRouter(routes) {
      if (this.page == routes) {
        return "ldeep wh";
      }
    },
    change(route, page) {
      this.$router.push(route);
      this.page = page;
    },
    /******* Methods default run ******/
    load: async function() {}
  }
};
</script>


<style>
.vs-sidebar--background {
  display: none;
}
.vs-sidebar--items::-webkit-scrollbar {
  display: none;
}
</style>

 