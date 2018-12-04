<template>
    <div id="app">
        <title>{{_mbs('tittle')}}</title>
        <Loading /> 
        <navbar v-if="$router.history.current.path != '/login'" />
        <div :class="'main ' " :style="checkResLogin()" >

            <router-view />

        </div>



    </div>


</template>

<script>
    import axios from "axios"
    import store from "./store/vuex"
    import Loading from "./components/DefaultComponent/Loading"
    import {
        get
    } from "vuex-pathify"

    import navbar from "./components/DefaultComponent/Navigation.vue";
    export default {
        name: "App",
        components: {
            Loading,
            navbar
        },
        data: () => ({

        }),
        computed: {
            _mbs: get("setting/setValue"),
            loading: get("loading/setLoad"),
            User: get("Login/userData"),
            /*---------Navbar Data--------------*/
            Nav: get('navbar/navbar'),
            changeNav: get('navbar/changeNavbar'),

            Active: get('navbar/active'),
            changeActive: get('navbar/changeActive'),

            Slide: get('navbar/slide'),
            changeSlide: get('navbar/changeSlide'),

        },
        props: {

        },
        methods: {
            onSlide() {
                if(this.Slide){
                     let url = this.$router.history.current.path;
                if (url == '/login' || url == '/root') {
                   return '';
                }else{
                    return 'margin-left:220px;';
                }
                    
                }else{
                    return '';
                }
            },

            showLoad: async function () {

                await store.dispatch("loading/showLoad")
            },
            dismissLoad: async function () {

                await store.dispatch("loading/dismissLoad")
            },

            loginCheck: async function () {
                let storage = window.localStorage;
                if (!storage.getItem('user-token')) {
                    this.changeNav(false);
                    this.$router.push('/login');
                } else {
                    this.changeNav(true);
                }
            },
                
            checkResLogin(){
                  let url = this.$router.history.current.path;
                if (url == '/login' || url == '/root'){
                    return ' ';
                }else{
                    return 'margin-left:80px!important;';
                }
            },

            switchNavbarWhenLogin: async function () {
             
                let url = this.$router.history.current.path;
                if (url == '/login' || url == '/root') {
                    this.changeNav(false);
                    try {
                        if (this.User.user.fullname) {
                            //alert('haveUser');
                            this.changeNav(true);
                            await this.$router.push('/');
                        }
                    } catch (error) {

                    }

                } else {
                    this.changeNav(true);
                }
            }

        },
        async mounted() {
            await store.dispatch("setting/getData");
            await store.dispatch("setting/getChoice");
            await this.loginCheck();
            await this.switchNavbarWhenLogin();
            await this.$store.dispatch('Login/getUserData');

            // this.load(true);
        },
        created() {
            this.$on("before-request", this.showLoad());
            this.$on("request-error", this.dismissLoad());
            this.$on("after-response", this.dismissLoad());
            this.$on("response-error", this.dismissLoad());

        },
        beforeDestroy() {
            this.$off("before-request", this.showLoad());
            this.$off("request-error", this.dismissLoad());
            this.$off("after-response", this.dismissLoad());
            this.$off("response-error", this.dismissLoad());
        }
    }
</script>

<style>
    @media only screen and (max-width: 1024px) {
        .main {
            margin-left: 0px !important;
        }
    }

    @media only screen and (min-width: 1024px) {
        .mr-fix-left {
            margin-left: 300px !important;
        }
    }
</style>