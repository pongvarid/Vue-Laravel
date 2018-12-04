<!----------Make By YourName---------------->
<template>
    <div>
        <div class="card shadow-bl ">
            <div class="card-header wh ldeep fs18">
                Company List
                <b-button @click="onModal()" class="btn lsea round bl change-right "><span class="mdi mdi-plus-circle"></span>&nbsp;Add
                    Company</b-button>

            </div>
            <div class="container "><br>
      
                <CompanyList ref="lists" :dataIn="dataIn"   @change="onUpdateModal" @view="read" @destroy="destroyData" />


                <br><br>

            </div>
        </div>


        <modal name="add-company" style="overflow-y: auto;" height="auto" adaptive draggable :clickToClose="false">
            <b-form @submit="storeData()" >
            <div class="modal-header lblue wh">
             
                <h5 class="modal-title" v-if="updated && !view" id="exampleModalCenterTitle">Edit Company</h5>
                <h5 class="modal-title" v-else-if="!updated && !view" id="exampleModalCenterTitle">Add Company</h5>
                <h5 class="modal-title" v-else id="exampleModalCenterTitle">Company</h5>
                <button type="button" class="close" @click="offModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                
                <div class="row">

                    <div class="col-12">
                        <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">Branch Information</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="container">


                            <Input :disabled="readonly"  label="Name" v-model="form.name" :def="form.name" cover="cover" :required="true" />
                            <Input :disabled="readonly" label="Website" v-model="form.website" :def="form.website" cover="cover" :required="true" />
                            <Input :disabled="readonly" label="Fax" v-model="form.fax" :def="form.fax" cover="cover" :required="true" />
                           {{'Timezone: '+ form.timezone}}
                            <Timezone v-if="!readonly" v-model="form.timezone" :def="form.timezone" :required="true" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <Input :disabled="readonly" label="Phone" v-model="form.phone" :def="form.phone" cover="cover" :required="true" />
                        <Input :disabled="readonly" label="Mobile" v-model="form.mobile" :def="form.mobile" cover="cover" :required="true" />
                        
                         {{'Currency: '+ form.currency}}
                        <Currency v-if="!readonly"   :def="form.currency"  :required="true"/>

                    </div>


                    <div class="col-12">
                        <div class="container"><br>
                            <Input :disabled="readonly" label="Description" v-model="form.description" :def="form.description" cover="cover" />
                            <!---  <Area v-model="form.description" label="Description" /> ---->
                        </div>
                    </div>

                    <div class="col-12">
                        <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">Address Information</h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="container">
                            <Input :disabled="readonly" label="Mailing Address" v-model="form.mailing_address" :def="form.mailing_address"
                                cover="cover" />
                            <Input :disabled="readonly" label="Mailing Street" v-model="form.mailing_street" :def="form.mailing_street"
                                Description cover="cover" />
                            <Input :disabled="readonly" label="Mailing City" v-model="form.mailing_city" :def="form.mailing_city" cover="cover" />
                            <Input :disabled="readonly" label="Mailing Remark" v-model="form.remark" :def="form.remark" cover="cover" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="container">
                            <Input :disabled="readonly" label="Mailing State/Province" v-model="form.mailing_state" :def="form.mailing_state"
                                cover="cover" />
                            <Input :disabled="readonly" label="Mailing zip code" v-model="form.mailing_zipcode" :def="form.mailing_zipcode"
                                cover="cover" />
                            <Input :disabled="readonly" label="Mailing Country" v-model="form.mailing_country" :def="form.mailing_country"
                                cover="cover" />
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
    import Input  from "../../../MbsComponent/Input";
    import Area from "../../../MbsComponent/Textarea";
    import Timezone from "../../../MbsComponent/timezone";
    import Currency from "../../../MbsComponent/currency";
    import CompanyList from './CompanyList';
    import swal from 'sweetalert2'
    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            Input,
            Area,
            Timezone,
            CompanyList,
            Currency
        },
        /*-------------------------Set Component---------------------------------------*/
        props: {
            readonly:false,
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
                    url: 'mbs/table/multi/branch'
                }
                this.dataIn = await this.$store.dispatch('default/getData', x);
              
 
            },
            read(value){
                this.readonly = true;
                this.form = value;
                this.view = true;
                  this.$modal.show('add-company');
            },
            hello(value) {
                alert(value);
            },
            //Open Modal method for set data when update
            onUpdateModal(value) {
                this.$modal.show('add-company');
                this.updated = true;
                this.form = value;
                this.readonly = false;
            },
            //Open Modal method for add data
            onModal() {
                this.$modal.show('add-company');
            },
            //Close Modal and reload data
            offModal() {
                this.$modal.hide('add-company');
                this.defaultForm();
                this.updated = false;
                this.view = false;
                this.load();
                this.i =true;
                this.getDataIn();
                this.readonly = false;
            },
            //getdefault form
            defaultForm() {
                let x = {
                    url: 'mbs/form/branch'
                }
                this.form = this.$store.dispatch('default/getData', x);
            },
            //Store data to vuex --post
            storeData: async function () {
                if (!this.updated) {
                    let storeParams = {
                        url: 'setting/company/branch',
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
                    url: 'setting/company/branch/' + this.form.id,
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
                    text: "You won't be delete your branch?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                          let destroyParams = {
                        url: 'setting/company/branch/' + value.id,
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
                    url: 'setting/company/branch'
                }
                this.data = await this.$store.dispatch('default/getData', x);
                console.log(this.data);
                   this.getDataIn();
            },
         
        },
    }
</script>