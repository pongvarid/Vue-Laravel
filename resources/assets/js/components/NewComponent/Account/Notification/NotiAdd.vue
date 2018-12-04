<!----------Make By YourName---------------->
<template>
    <div>
        <div class="card shadow-bl ">
            <div class="card-header wh ldeep fs18">
                Notification List
                <b-button @click="onModal()" class="btn lsea round bl change-right "><span class="mdi mdi-plus-circle"></span>&nbsp;Add
                    Notification</b-button>

            </div>
            <div class="container "><br>
      
                <NotiList ref="lists" :dataIn="dataIn"   @change="onUpdateModal" @view="read" @destroy="destroyData" />


                <br><br>

            </div>
        </div>


        <modal name="add-noti" style="overflow-y: auto;" height="auto" adaptive draggable :clickToClose="false">
            <b-form @submit="storeData()" >
            <div class="modal-header lblue wh">
             
                <h5 class="modal-title" v-if="updated && !view" id="exampleModalCenterTitle">Edit Account</h5>
                <h5 class="modal-title" v-else-if="!updated && !view" id="exampleModalCenterTitle">Add Account</h5>
                <h5 class="modal-title" v-else id="exampleModalCenterTitle">Account</h5>
                <button type="button" class="close" @click="offModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                
                <div class="row">

                    <div class="col-12">
                        <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">Account Information</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="container">
                            <Input label="Name" v-model="form.name" :def="form.name" cover="cover" :required="true" />
                            <Input label="Website" v-model="form.website" :def="form.website" cover="cover" :required="true" />
                            <Input label="Fax" v-model="form.fax" :def="form.fax" cover="cover" :required="true" />
                            <Input label="Description" v-model="form.description" :def="form.description" cover="cover" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <Input label="Account Owner" v-model="form.users_id" :def="form.users_id" cover="cover" :required="true" />
                        <Input label="Phone" v-model="form.phone" :def="form.phone" cover="cover" :required="true" />
                        <Input label="Mobile" v-model="form.mobile" :def="form.mobile" cover="cover" :required="true" />
                        <Select :required="true" name="Industry Type" cover="Industry Type" v-model="form.industry_type"   :def="form.industry_type" :disabled="readonly" /><br>
                        <Input label="Employee" v-model="form.employee" :def="form.employee" cover="cover" :required="true" />

                    </div>

                    <div class="col-12">
                        <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">Address Information</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="container">
                            <Input label="Billing Address" v-model="form.billing_address" :def="form.billing_address"
                                cover="cover" />
                            <Input label="Billing Street" v-model="form.billing_street" :def="form.billing_street"
                                cover="cover" />
                            <Input label="Billing City" v-model="form.billing_city" :def="form.billing_city" cover="cover" />
                            <Input label="Billing State" v-model="form.billing_state" :def="form.billing_state" cover="cover" />
                            <Input label="Billing Zipcode" v-model="form.billing_zipcode" :def="form.billing_zipcode" cover="cover" />
                            <Input label="Billing Country" v-model="form.billing_country" :def="form.billing_country" cover="cover" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="container">
                            <Input label="Shipping Address" v-model="form.shipping_address" :def="form.shipping_address"
                                cover="cover" />
                            <Input label="Shipping Street" v-model="form.shipping_street" :def="form.shipping_street"
                                cover="cover" />
                            <Input label="Shipping City" v-model="form.shipping_city" :def="form.shipping_city" cover="cover" />
                            <Input label="Shipping State" v-model="form.shipping_state" :def="form.shipping_state" cover="cover" />
                            <Input label="Shipping Zipcode" v-model="form.shipping_zipcode" :def="form.shipping_zipcode" cover="cover" />
                            <Input label="Shipping Country" v-model="form.shipping_country" :def="form.shipping_country" cover="cover" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" v-if="view == false">
                <button type="button" @click="offModal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button    type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </b-form>
        </modal>

    </div>
</template>

<script>
    import {
        get
    } from "vuex-pathify";
    import Input from "../../../MbsComponent/Input";
    import Area from "../../../MbsComponent/Textarea";
    import Select from "../../../DefaultComponent/Select";
    import Timezone from "../../../MbsComponent/timezone";
    import Currency from "../../../MbsComponent/currency";
    import NotiList from './NotiList';
    import swal from 'sweetalert2'
    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            Input,
            Area,
            Timezone,
            NotiList,
            Currency,
            Select
        },
        /*-------------------------Set Component---------------------------------------*/
        props: {

        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                form: {},
                data: {},
                updated: false,
                view:false,
                i:true,

                dataIn:{},
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
        /*-------------------------Methods------------------------------------------*/
        methods: {
             getDataIn: async function () {
              
                     let x = {
                    url: 'mbs/table/multi/account_notification'
                }
                this.dataIn = await this.$store.dispatch('default/getData', x);
              
 
            },
            read(value){
                this.form = value;
                this.view = true;
                  this.$modal.show('add-noti');
            },
            hello(value) {
                alert(value);
            },
            //Open Modal method for set data when update
            onUpdateModal(value) {
                this.$modal.show('add-noti');
                this.updated = true;
                this.form = value;
            },
            //Open Modal method for add data
            onModal() {
                this.$modal.show('add-noti');
            },
            //Close Modal and reload data
            offModal() {
                this.$modal.hide('add-noti');
                this.defaultForm();
                this.updated = false;
                this.view = false;
                this.load();
                this.i =true;
                this.getDataIn();
            },
            //getdefault form
            defaultForm() {
                let x = {
                    url: 'mbs/form/account_notification'
                }
                this.form = this.$store.dispatch('default/getData', x);
            },
            //Store data to vuex --post
            storeData: async function () {
                if (!this.updated) {
                    let storeParams = {
                        url: 'account_notification',
                        form: this.form
                    }
                    this.data = await this.$store.dispatch('default/storeData', storeParams);
                    this.offModal();
                } else {
                    this.updateData();
                }
            
               
            },
            //Update data to vuex --put
            updateData: async function () {
                let updateParams = {
                    url: 'account_notification/' + this.form.id,
                    form: this.form
                }
                this.data = await this.$store.dispatch('default/updateData', updateParams);
                  this.i = false;
               this.offModal();
                
                
             
            },
            //Delete data to vuex --delete
            destroyData: async function (value) {
                
                swal({
                    title: 'Are you sure?',
                    text: "You won't be delete your notification?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                          let destroyParams = {
                        url: 'account_notification/' + value.id,
                        form: value
                    }
                    this.data =  this.$store.dispatch('default/destroyData', destroyParams);
                    this.offModal();
                       
                    }
                    }) 
                   
                  

            },
            /******* Methods default run ******/
            load: async function () {
                let x = {
                    url: 'account_notification'
                }
                this.data = await this.$store.dispatch('default/getData', x);
                console.log(this.data);
                   this.getDataIn();
            },
         
        },
    }
</script>