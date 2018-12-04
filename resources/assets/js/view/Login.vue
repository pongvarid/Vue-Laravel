<template>
    <div class="font" id="top-image">
        <div class="container lsd">
            <div class="row">
                <div class="col w3-hide-small ">
                    <div class="box-header ">
                        <h1 class="header-txt wh" style="text-shadow: 2px 2px 4px #000000; font-size:58px;">Welcome</h1>
                        <img class="header-img" src="https://www.picz.in.th/images/2018/10/26/3WX30t.png" alt="">
                    </div>
                </div>
                <div class="col">
                    <div class="login-page animated bounceIn">
                        <div class="form">
                            <img src="https://www.picz.in.th/images/2018/10/26/3WXs7f.png" style="width:220px;" alt="">
                            <br><br> 
                            <form @submit="login" class="login-form">
                                <input v-model="form.email" type="text" placeholder="Username" />
                                <input v-model="form.password"  type="password" placeholder="Password" />
                                <button type="submit" class="btn btn-lg ldeep round big wh">Login</button>
                                
                            </form>
                            <p v-if="_mbs('register_lock') == 1" class="message">Not registered? <a href="#">Create an account</a></p>
                             <p v-if="_mbs('reset-password') == 1" class="message">Reset <a href="#">Pasword</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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
        form:{ 
        email:'',
        password:'',
        }
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
     _mbs: get("setting/setValue"),
      token:get('Login,userToken'),
        userData:get('Login,userData'),
        navOn: get("setting/navOn"),
        naviOn: get("setting/naviOn"),    
        
            /*---------Navbar Data--------------*/ 
        Nav:get('navbar/navbar'),
        changeNav:get('navbar/changeNavbar'),

        Active:get('navbar/active'),
        changeActive:get('navbar/changeActive'),

        Slide:get('navbar/slide'),
        changeSlide:get('navbar/changeSlide'),
  },
  /*-------------------------Methods------------------------------------------*/
  methods: {
    login: async function(){

        let login =  await this.$store.dispatch('Login/Login',this.form); 
        await this.checkUserLogin();
               
    },


    checkUserLogin:async function(){
        let storage = await window.localStorage;
       if(storage.getItem('user-token')){ 
         await this.$router.push('/');
             this.changeNav(true); 
              
        }else{
            this.form={};
        }
        
         
      
    },

  
    /******* Methods default run ******/
    load: async function() {
        this.$store.dispatch('Login/getUserData');
       this.naviOn(false);
           
 
    }   
  }
};
</script>

<style>
.header-txt {
  font-size: 50px;
}
.header-img {
  width: 400px;
}

.lsd {
  margin-top: 10%;
}
.box-header {
  margin-top: 25%;
}
.form {
  position: relative;
  z-index: 1;
  background: #ffffff;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  border-radius: 40px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

 

 

.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}

.form .message a {
  color: #4caf50;
  text-decoration: none;
}

.form .register-form {
  display: none;
}
</style>