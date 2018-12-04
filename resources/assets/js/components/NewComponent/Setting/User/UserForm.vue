<!----------Make By YourName---------------->
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-12">
                    
                    <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">User Image</h2>
                    <div class="pd-10">
                        <image-uploader v-if="!readonly" :preview=false :maxWidth="512" :quality="0.7" v-model="form.img_user"></image-uploader>
                        <br>
                       <center> <img class="wd120 hg120 round" :src="form.img_user" alt=""> </center>
                    </div>

                </div>
                <div class="col-sm-6 col-12">
                    <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">User Information</h2>
                    <div class="pd-10">
                         
                        <b-form @submit="submit">

                            <b-alert v-model="message.show"  variant="danger" dismissible  >
                             {{message.txt}}
                            </b-alert>
                      <!-----  {{form.permission}}  ---->
                           <Select :required="true" name="UserPermission" cover="User Permission" v-model="form.permission"   :def="form.permission" :disabled="readonly" /><br>
                        <!-----     {{form.branch_id}}   ---->
                            <SelectTable   :required="true" table="branch" v-model="form.branch_id" :def="form.branch_id"
                                cover="Branch" :disabled="readonly" /> 

                            <Input :required="true" icon="mdi mdi-account" 
                                v-model="form.username" :def="form.username"
                                 label="Username" cover="cover" :disabled="readonly" />

                            <Input :required="true" icon="mdi mdi-pen"
                                 v-model="form.fullname" :def="form.fullname"
                                label="Fullname" cover="cover" :disabled="readonly" />

                            <Input :required="true" :email="true" icon="mdi mdi-email" v-model="form.email" 
                            :def="form.email"  label="Email" cover="cover" :disabled="readonly" />

                            <Input :required="true" icon="mdi mdi-phone" v-model="form.phone" :def="form.phone" label="Phone"
                                cover="cover" :disabled="readonly" />

                              <Input :password="true" v-if="(add)" v-model="form.password" label="New Password" cover="cover" />
                              <Input :password="true" v-if="(add)" v-model="conf_password" label="Confirm Password" cover="cover" />

                            <b-btn v-if="!readonly && !add" v-b-toggle="'password'" class="m-1 round lblue"><span class="mdi mdi-textbox-password"></span>&nbsp;Change
                                Password</b-btn>

                            <!-- element to collapse -->
                            <b-collapse id="password" >
                                <b-card>
                                    <Input :password="true" v-model="form.password" label="New Password" cover="cover" />
                                    <Input :password="true" v-model="conf_password" label="Confirm Password" cover="cover" />
                                </b-card>
                            </b-collapse>
                              <div class="modal-footer"  v-if="!readonly " > 
                                <button    type="submit" class="btn btn-primary">Save changes</button>
                            </div> 
                        </b-form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import Input from '../../../MbsComponent/Input';
    import Select from '../../../DefaultComponent/Select';
    import SelectTable from '../../../DefaultComponent/SelectTable';
    import {
        ImageUploader
    } from 'vue-image-upload-resize';
    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            Input,
            ImageUploader,
            Select,
            SelectTable,

        },
        /*-------------------------Set Component---------------------------------------*/
        props: {
            def:{},
            readonly:false,
            add:false,
            change:'',
            update:0,
        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                form: this.def,
                message: {
                    txt: '',
                    show: false
                },
                conf_password:null,
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

        },
        watch: {
              change(value) {
               this.load(); 
            },
            def(value) {
              this.form = value
              console.log(value);
              
            }
        },
        /*-------------------------Methods------------------------------------------*/
        methods: {

            getMessage(txt, show) {
                this.message.show = show;
                this.message.txt = txt;
                console.log(txt);
            },

            submit() {
                console.log(this.form.password.length);
                     this.checkMessage();
                if (this.form.permission == '') {
                      this.message.show = true;
                    this.getMessage('Please Choose User Permission', true);

                }
                 else if (this.form.branch_id == '') {
                     this.message.show = true;
                    this.getMessage('Please Choose Branch Name', true);

                } else if (Number(this.form.password.length) < 6) {
                    this.message.show = true;
                    this.getMessage('Password must have more 6 character!', true);

                } else if (this.form.password != this.conf_password && this.form.password != null&& this.conf_password != null) {
                    this.message.show = true;
                    this.getMessage('Password is not match!', true);

                } 
                
                else {
                    this.getMessage('', false);
                    if(!this.update){
                        this.$emit('store', this.form);
                    }else{
                        this.$emit('update', this.form);
                    }
                    
                }
            },

            checkMessage(){
                console.log(this.message.show);
                if(this.message.show  == true){
                    this.message.show = false;
                }
            },

            /******* Methods default run ******/
            load: async function () {
           
           }
        },
    }
</script>