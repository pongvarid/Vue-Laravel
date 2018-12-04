<template>
  <div v-if="Nav">
    <!-- Top container -->
    <div :class="'w3-bar w3-top shadow w3-large '+_mbs('navbar')" style="z-index:4">
      <span class="w3-bar-item w3-left w3-hide-small">
        <img src="../../assets/image/ver.png" style="height:40px!important">
      </span>
      <button
        class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey wh"
        @click="on()"
      >
        <i class="fa fa-bars"></i>
        &nbsp;Menu
      </button>
      <a @click="$router.push('/profile')" :class="'w3-bar-item w3-button pd-16 w3-right'">
        <img class="w3-circle avatar" :src="getImge(userData)" alt>&nbsp;
        {{getUser(userData)}}
      </a>
      <button
        class="w3-bar-item w3-button w3-hide-small w3-hover-none w3-hover-text-light-grey wh mrt-8"
        @click="SlideChange()"
      >
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <!-- Sidebar/menu -->
    <nav
      v-if="Slide"
      :class="_mbs('navbar')+' outer-container  w3-sidebar  w3-collapse  w3-white w3-animate-left '+navCss"
      style="z-index:3;width:220px;"
    >
      <br>
      <!-----   <div class="w3-container w3-row">
        <div class="w3-col 12 pd-20"><br><br>
          <center> <img src="../../assets/image/logo.png" style="width:80%;!important"></center>
        </div>

      </div>
      <hr>
      <div class="w3-container">

      </div>  ---------->
      <br>
      <br>
      <br>
      <div class="w3-bar-block wh nav-noselect font inner-container">
        <!---- <a @click="$router.push('/debug')" class="w3-bar-item w3-button  pd-16  w3-active"  >&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-shopping"></i>&nbsp;
          Component</a>
         <a @click="$router.push('/debug/select')"    class="w3-bar-item w3-button  pd-16    "  >&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-shopping"></i>&nbsp;
          Select</a>
             <a @click="$router.push('/debug/datatable')"   class="w3-bar-item w3-button  pd-16    "  >&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-shopping"></i>&nbsp;
          Datable</a>
          
              <a @click="$router.push('/debug/alert')"    class="w3-bar-item w3-button  pd-16    "  >&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-shopping"></i>&nbsp;
          Alert</a>

            <a @click="$router.push('/setting')"  class="w3-bar-item w3-button  pd-16    "  >&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-shopping"></i>&nbsp;
          Setting</a> 
        <a @click="$router.push('/root')"  class="w3-bar-item w3-button  pd-16    " >&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-shopping"></i>&nbsp;
        Root</a> ---->
        <a @click="$router.push('/')" :class="'w3-bar-item w3-button pd-16 ' + active('/')">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-desktop-mac-dashboard"></i>&nbsp;
          Dashboard
        </a>

        <b-btn
          v-b-toggle.collapse1
          :class="'w3-bar-item w3-button pd-16 '"
          style="background:transparent;"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-account-convert"></i>&nbsp;
          Lead
        </b-btn>
        <b-collapse id="collapse1" class="mt-2 lhead">
          <a dv-b-toggle.lead :class="'w3-bar-item w3-button pd-16 ' + active('/lead/information')">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-information"></i>&nbsp;
            Information
          </a>
          
          <a dv-b-toggle.lead :class="'w3-bar-item w3-button pd-16 ' + active('/lead/activity')">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-chart-bubble"></i>&nbsp;
            Acticity
          </a>
        </b-collapse>

        <a
          @click="$router.push('/agent')"
          :class="'w3-bar-item w3-button pd-16 ' + active('/agent')"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-human-greeting"></i>&nbsp;
          Agent
        </a>
        
        <a
          @click="$router.push('/supplier')"
          :class="'w3-bar-item w3-button pd-16 ' + active('/supplier')"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-human-male-female"></i>&nbsp;
          Supplier
        </a>
        
        <a
          @click="$router.push('/operation')"
          :class="'w3-bar-item w3-button pd-16 ' + active('/operation')"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-calculator-variant"></i>&nbsp;
          Operation
        </a>
        
        <a
          @click="$router.push('/account')"
          :class="'w3-bar-item w3-button pd-16 ' + active('/account')"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-human-handsup"></i>&nbsp;
          Account
        </a>

        <b-btn
          v-b-toggle.Contract
          :class="'w3-bar-item w3-button pd-16 ' + active('/contract')"
          style="background:transparent;"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-account-card-details"></i>&nbsp;
          Contract
        </b-btn>
        <b-collapse id="Contract" class="mt-2 lhead">
          <a
            dv-b-toggle.lead
            :class="'w3-bar-item w3-button pd-16 ' + active('/contract/information')"
          >
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-information"></i>&nbsp;
            Information
          </a>
          
          <a
            dv-b-toggle.lead
            :class="'w3-bar-item w3-button pd-16 ' + active('/contract/acticity')"
          >
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-chart-bubble"></i>&nbsp;
            Acticity
          </a>
        </b-collapse>

        <b-btn
          v-b-toggle.Opperatunity
          :class="'w3-bar-item w3-button pd-16 ' + active('/opperatunity')"
          style="background:transparent;"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-hexagon-multiple"></i>&nbsp;
          Opperatunity
        </b-btn>
        <b-collapse id="Opperatunity" class="mt-2 lhead">
          <a
            dv-b-toggle.lead
            :class="'w3-bar-item w3-button pd-16 ' + active('/opperatunity/information')"
          >
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-information"></i>&nbsp;
            Information
          </a>
          
          <a
            dv-b-toggle.lead
            :class="'w3-bar-item w3-button pd-16 ' + active('/opperatunity/activity')"
          >
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-chart-bubble"></i>&nbsp;
            Acticity
          </a>
        </b-collapse>

        <a
          @click="$router.push('/product')"
          :class="'w3-bar-item w3-button pd-16 ' + active('/product')"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-shopping"></i>&nbsp;
          Product
        </a>
        
        <a
          @click="$router.push('/prediction')"
          :class="'w3-bar-item w3-button pd-16 ' + active('/prediction')"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-chart-areaspline"></i>&nbsp;
          Prediction
        </a>
        
        <a
          @click="$router.push('/report')"
          :class="'w3-bar-item w3-button pd-16 ' + active('/report')"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-file-document-box-multiple"></i>&nbsp;
          Report
        </a>

        <b-btn
          v-b-toggle.setting
          :class="'w3-bar-item w3-button pd-16 ' + active('/setting/company')+' '+ active('/setting/user')"
          style="background:transparent;"
        >
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-settings"></i>&nbsp;
          Setting
        </b-btn>
        <b-collapse id="setting" class="mt-2">
          <a
            @click="$router.push('/setting/company')"
            :class="'w3-bar-item w3-button pd-16 ' + active('/setting/company')"
          >
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-office-building"></i>&nbsp;
            Company
          </a>
          
          <a
            @click="$router.push('/setting/user')"
            :class="'w3-bar-item w3-button pd-16 ' + active('/setting/user')"
          >
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-account"></i>&nbsp;
            User
          </a>
          
          <a
            @click="$router.push('/setting/web')"
            :class="'w3-bar-item w3-button pd-16 ' + active('/web')"
          >
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="mdi mdi-web"></i>&nbsp;
            Website Setting
          </a>
        </b-collapse>

        <a @click="logout()" class="w3-bar-item w3-button pd-16">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <i class="mdi mdi-logout"></i>&nbsp;
          Logout
        </a>
      </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div
      class="w3-overlay w3-hide-large w3-animate-opacity"
      @click="on()"
      style="cursor:pointer"
      title="close side menu"
      id="myOverlay"
    ></div>

    <!-- !PAGE CONTENT! -->
    <!-- End page content -->
  </div>
</template>

<script>
import { get } from "vuex-pathify";
import swal from "sweetalert2";

export default {
  props: {
    url: ""
  },

  data: () => ({
    nbsp: "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",
    nav: true,
    navCss: "none",
    navFull: true,
    name: ""
  }),
  computed: {
    userData: get("Login,userData"),
    _mbs: get("setting/setValue"),
    getToken: get("Login/userToken"),
    /*---------Navbar Data--------------*/

    Nav: get("navbar/navbar"),
    changeNav: get("navbar/changeNavbar"),

    Active: get("navbar/active"),
    changeActive: get("navbar/changeActive"),

    Slide: get("navbar/slide"),
    changeSlide: get("navbar/changeSlide")
  },
  mounted() {
    this.load();
  },
  methods: {
    active(url) {
      return this.$router.history.current.path == url
        ? this._mbs("theme-drop")
        : "";
    },

    getUser(name) {
      let user = JSON.parse(JSON.stringify(name));
      try {
        let fullname = user.user.fullname;
        return fullname;
      } catch (e) {}
    },
    getImge(img) {
      let user = JSON.parse(JSON.stringify(img));
      try {
        let img_user = user.user.img_user;
        return img_user;
      } catch (e) {}
    },
    load: async function() {},
    lead() {
      swal({
        title: "Where did yo go to Lead?",
        text: "Choose your lead menu.",
        showCancelButton: true,
        confirmButtonColor: "#1E90FF",
        confirmButtonText: "Acticity",
        cancelButtonText: "Information",
        cancelButtonColor: "#1E90FF"
      }).then(result => {
        if (result.value) {
          swal("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },

    SlideChange() {
      if (this.Slide) {
        this.changeSlide(false);
      } else {
        this.changeSlide(true);
      }
    },
    on() {
      this.changeSlide(true);
      if (this.nav) {
        this.navCss = "block";
        this.nav = false;
      } else {
        this.navCss = "none";
        this.nav = true;
      }
    },

    logout: async function() {
      await this.$store.dispatch("Login/logout");
      this.changeNav(false);
      this.$router.push("/login");
      location.reload();
    }
  }
};
</script>



<style>
.bgpp {
  background: red !important;
}

.none {
  display: none !important;
}

.block {
  display: block !important;
}

.outer-container {
}
.inner-container {
}
.inner-container::-webkit-scrollbar {
}
</style>