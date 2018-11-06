<template>
  <div  v-if="Nav">

    <!-- Top container -->
    <div   :class="'w3-bar w3-top shadow w3-large '+_mbs('navbar')" style="z-index:4">
       
      <span   class="w3-bar-item w3-left w3-hide-small">
        <img  src="../../assets/image/logo.png" style="height:40px!important"></span>
      <button  class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey wh" @click="on()">
        <i class="fa fa-bars"></i>
        &nbsp;Menu</button>
      <span class="w3-bar-item w3-right wh"><img class="w3-circle avatar" src="https://image.freepik.com/free-icon/male-user-shadow_318-34042.jpg"
          alt=""> {{User.user.name}}</span>
      <button class="w3-bar-item w3-button  w3-hide-small w3-hover-none w3-hover-text-light-grey wh mrt-8" @click="SlideChange()"><i
          class="fa fa-bars"></i></button>

    </div>

    <!-- Sidebar/menu -->
    <nav  v-if="Slide" :class="_mbs('navbar')+' outer-container  w3-sidebar  w3-collapse  w3-white w3-animate-left '+navCss" style="z-index:3;width:220px;"><br>
   <!-----   <div class="w3-container w3-row">
        <div class="w3-col 12 pd-20"><br><br>
          <center> <img src="../../assets/image/logo.png" style="width:80%;!important"></center>
        </div>

      </div>
      <hr>
      <div class="w3-container">

      </div>  ----------><br><br><br>
      <div class="w3-bar-block wh nav-noselect font inner-container">
     
       <a @click="$router.push('/Component')" class="w3-bar-item w3-button  pd-16    ">&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-logout"></i>&nbsp;
          Component & Alerts</a>
        
        <a @click="$router.push('/Datatable')" class="w3-bar-item w3-button  pd-16    ">&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-logout"></i>&nbsp;
          DataTable</a>
        
         <b-btn v-b-toggle.setting class="w3-bar-item w3-button pd-16" style="background:transparent;">&nbsp;&nbsp;&nbsp;&nbsp;
         <i class="mdi mdi-settings"></i>&nbsp;
          Setting</b-btn>
            <b-collapse id="setting" :class="'mt-2 '+ _mbs('navbar_collapse')"  >
              
                     <a  @click="$router.push('/setting/web')"  class="w3-bar-item w3-button pd-16" >&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="mdi mdi-web"></i>&nbsp;
                    Website Setting
                  </a>
            </b-collapse>



        <a @click="logout()" class="w3-bar-item w3-button  pd-16    "  >&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-logout"></i>&nbsp;
          Logout</a>
 
      </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" @click="on()" style="cursor:pointer" title="close side menu"
      id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
  


    <!-- End page content -->
  </div>

 
</template>

<script>
  import {
    get
  } from "vuex-pathify"
  import swal from 'sweetalert2'

  export default {
    name: "App",

    data: () => ({
      nbsp: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
      nav: true,
      navCss: 'none',
      navFull: true,
    }),
    computed: {
      User:get("Login/userData"),
      _mbs: get("setting/setValue"), 
        getToken:get("Login/userToken"),
        /*---------Navbar Data--------------*/ 
        Nav:get('navbar/navbar'),
        changeNav:get('navbar/changeNavbar'),

        Active:get('navbar/active'),
        changeActive:get('navbar/changeActive'),

        Slide:get('navbar/slide'),
        changeSlide:get('navbar/changeSlide'),

        
    },
    mounted() {
      
    },
    methods: {

      lead(){
      swal({
        title: 'Where did yo go to Lead?',
        text: "Choose your lead menu.", 
        showCancelButton: true, 
        confirmButtonColor:'#1E90FF', 
        confirmButtonText: 'Acticity',
        cancelButtonText:'Information',
        cancelButtonColor:'#1E90FF', 
      }).then((result) => {
        if (result.value) {
          swal(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
      },

      SlideChange(){
        if(this.Slide){
          this.changeSlide(false);
        }else{
           this.changeSlide(true);
        }
      },
      on() {
        this.changeSlide(true);
        if (this.nav) {
          this.navCss = 'block';
          this.nav = false; 
        } else {
          this.navCss = 'none';
          this.nav = true; 
        }

      },
 
    logout:async function(){
      this.$store.dispatch('Login/logout'); 
      this.changeNav(false);
      location.reload();
    }

    },

  }
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