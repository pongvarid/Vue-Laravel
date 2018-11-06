<!----------Make By YourName---------------->
<template>
    <div class="container">
        <br><br><br>

        <div class="row">
            <div class="col-6">

                <div class="card shadow-bl  ">
                    <div :class="'card-header wh ' + _mbs('navbar')">
                        Alert
                    </div>
                    <div class="container pd-20">
                        <Button @click="nm()" class="btn round wd300">Alert</Button> <br><br>
                        <Button @click="success()" class="btn round lok wd300">success</Button> <br><br>
                        <Button @click="error()" class="btn round knot wd300">error</Button> <br><br>
                        <Button @click="warning()" class="btn round lpop wd300">warning</Button> <br><br>
                        <Button @click="info()" class="btn round ldeep wd300">info</Button> <br><br>
                        <Button @click="other()" class="btn round lsea wd300">other</Button> <br><br>

                    </div>
                </div>
            </div>



            <div class="col-6">


                <div class="card shadow-bl  ">
                    <div :class="'card-header wh ' + _mbs('navbar')">
                        Select
                    </div>
                    <div class="container pd-20">
                        <Select v-model="valSelect" name="UserPermission" />
                    </div>
                </div>
                <br><br>

            </div>
        </div>

        <br><br>
        <div class="card shadow ccx" style="width:480px; height:200px; border-radius:20px!important;">
            <div class="container-fulid">
                <div class="row">
                    <div class="col-4 borderx" style="z-index: -2; height:200px; width:480px;">
                        <img class="borderx" style=" margin-left:0.5; z-index: -1;" height="199px" width="279px;" src="https://amp.businessinsider.com/images/583daf7fe02ba75f658b596e-750-563.jpg"
                            alt="">

                    </div>
                    <div class="col-8 pdl-90 pdt-30">
                        <h3 class="wh nm"> Hello</h3>
                        <hr style="width:80%;" class="box-white">
                        <p class="wh">I am Pongvarid</p>
                        <button class="btn btn-default box-yellow">Detail Me</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="mr-40 shadow" style="height:480px; width:300px;">
            <img src="https://uppic.cc/d/XoQ" style="width:300px; position: absolute;  z-index: -1;" alt="">
            <br><br><br><br><br><br>
            <h2 class="mrl-40">Login</h2>
            <div class="container">

                <input type="text" class="form-control mrt-50" placeholder="Username">
                <input type="text" class="form-control mrt-10" placeholder="Password">
                <center> <button style="width:50%;" class="btn btn-lg btn-info mrt-30 ">Login</button> </center><br>
                <hr>
                <center><b style="color:#87CEFA;">Register New User</b></center>
            </div>

        </div>

    </div>
</template>

<script>
    import swal from 'sweetalert2'
    import {
        get
    } from "vuex-pathify";
    import Select from "../components/DefaultComponent/Select";
    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            Select
        },
        /*-------------------------Set Component---------------------------------------*/
        props: {

        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {

            };
        },
        /*-------------------------Run Methods when Start this Page------------------------------------------*/
        async mounted() {
            /**** Call loading methods*/
            this.load();
        },
        /*-------------------------Run Methods when Start Routed------------------------------------------*/
        async beforeRouteEnter(to, from, next) {
            next()
        },
        /*-------------------------Vuex Methods and Couputed Methods------------------------------------------*/
        computed: {
            _mbs: get("setting/setValue"),
        },
        /*-------------------------Methods------------------------------------------*/
        methods: {
            nm() {
                alert("Alert!");
            },
            success() {
                swal({
                    type: 'success',
                    title: 'Success...',
                    title: 'Your work has been finish',
                })
            },
            error() {
                swal({
                    type: 'error',
                    title: 'Error...',
                    title: 'Your work has been error',
                })
            },
            warning() {
                swal({
                    type: 'warning',
                    title: 'warning...',
                    title: 'Your work has been warning',
                })
            },
            info() {
                swal({
                    type: 'info',
                    title: 'info...',
                    title: 'Your work has been info',
                })
            },
            other() {
                swal({
                    title: "Delete Success",
                    text: "Remove data from database success.",
                    imageUrl: "https://cdn1.iconfinder.com/data/icons/appicns/513/appicns_Trash_Full.png",
                    imageWidth: 160,
                    imageHeight: 160,
                })
            },
            /******* Methods default run ******/
            load: async function () {}
        },
    }
</script>

<style>
    .relative {
        position: relative;
    }

    .login-container-wrapper .logo {
        position: absolute;
        top: -42px;
        margin: 0 auto;
        width: 25%;
        height: 100px;
        left: 37.5%;
        border-radius: 50%;
    }

    .login-container-wrapper {
        max-width: 400px;
        margin: 10% auto 8%;
        padding: 40px;
        box-sizing: border-box;

        border-radius: 20px;
        position: relative;
        padding-top: 80px;
    }

    .logo .fa {
        font-size: 50px;
    }

    .login input:focus+.fa {
        color: #fff;
    }

    .login-form .form-group {
        margin-right: 0;
        margin-left: 0;
    }

    .modal-full {
        min-width: 100%;
        margin: 0;
    }

    .modal-full .modal-content {
        min-height: 100vh;
    }

    .ccx {

        background: linear-gradient(to right, rgba(42, 159, 255, .2) 0%, rgba(10, 104, 138, 1) 60%, rgba(10, 104, 132, 1) 100%);
        background-blend-mode: multiply;
    }

    .borderx {
        -webkit-border-top-left-radius: 20px;
        -webkit-border-bottom-left-radius: 20px;
        -moz-border-radius-topleft: 20px;
        -moz-border-radius-bottomleft: 20px;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }
</style>