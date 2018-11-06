<!----------Make By YourName---------------->
<template>
    <div class="container"><br> <br><br><br>
        <div class="row">

            <div class="col-12">
                <b-card class="shadow-bl circle">
                    <div class='row'>
                        <div class='col-12'>
                            <h1><span class="mdi mdi-settings"></span>&nbsp;Setting</h1>
                        </div>
                    </div>
                </b-card>
            </div>
                
            <div class="col-8"><br><br>
                <div class="card shadow-bl  ">
                    <div :class="'card-header wh '+ _mbs('navbar')">
                        Setting Name and Register
                    </div>
                    <div class="container pd-20">
                        <h3> Now Your Website Name is <b>{{_mbs('tittle')}}</b>.</h3><br>

                        <div class="input-group mb-3">
  <input class="form-control" type="text" v-model="name" placeholder="Your New name website">
  <div class="input-group-append">
    <b-button class="btn lok round light" @click="changeName()">ChangeName</b-button>
  </div>
</div> 
                        <br> 
                        Activate Register Button:
                        <b-button v-if="_mbs('register_lock') == '0'" class="btn lpop round light" @click="registerChange(1)">On
                            Register</b-button>
                        <b-button v-else class="btn lnot round light" @click="registerChange(0)">Off Register</b-button>

                        <br>
                        <hr>
                    </div>
                </div>

            </div>

            <div class="col-4">
                    <br><br>
                <div class="card shadow-bl  ">
                    <div :class="'card-header wh '+ _mbs('navbar')">
                        Setting Image Logo
                    </div>
                    <div class="container pd-20">

                        <center :class="_mbs('navbar')"><img style="width:220px;" src="../../assets/image/logo.png" alt=""></center>

                        <div class="file-upload-form">
                            Upload an image file:
                            <input type="file" :class="_mbs('navbar') + ' round'" @change="previewImage" accept="image/png">
                        </div>
                        <div class="image-preview" v-if="imageData.length > 0">
                            <img class="preview" :src="imageData"><br>
                            <hr>
                            <b-button class="btn btn-lg lok round" @click="upload()">Upload</b-button>
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </div>
</template>

<script>
    import {
        get
    } from "vuex-pathify";
    import axios from 'axios';
    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {

        },
        /*-------------------------Set Component---------------------------------------*/
        props: {

        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                imageData: ""
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
            previewImage: function (event) {
                // Reference to the DOM input element
                var input = event.target;
                // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                    // create a new FileReader to read this image and convert to base64 format
                    var reader = new FileReader();
                    // Define a callback function to run, when FileReader finishes its job
                    reader.onload = (e) => {
                        // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                        // Read image as base64 and set to imageData
                        this.imageData = e.target.result;
                    }
                    // Start the reader job - read file as a data url (base64 format)
                    reader.readAsDataURL(input.files[0]);
                }
            },

            changeName: async function () {
                let form = {
                    id: 2,
                    value: this.name,
                }
                axios.put('/mbs/setting/2', form)
                    .then(response => {
                        location.reload();
                    });
            },
            registerChange: async function (params) {
                let form = {
                    id: 17,
                    value: params,
                }
                axios.put('/mbs/setting/17', form)
                    .then(response => {
                        location.reload();
                    });
            },

            upload: async function () {
                axios.post('/api/mbs/setting/image', {
                        image: this.imageData
                    })
                    .then(response => {
                        location.reload();
                    });
            },
            /******* Methods default run ******/
            load: async function () {

            }
        },
    }
</script>

<style>
    .file-upload-form,
    .image-preview {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        padding: 20px;
    }

    img.preview {
        width: 200px;
        background-color: white;
        border: 1px solid #DDD;
        padding: 5px;
    }
</style>