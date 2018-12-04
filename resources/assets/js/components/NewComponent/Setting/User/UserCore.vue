<!----------Make By YourName---------------->
<template>
    <div>
        <div class="card shadow-bl  ">
            <div class="card-header wh ldeep fs18">
                UserList
                   <b-button @click="onModal()" class="btn lsea round bl change-right "><span class="mdi mdi-plus-circle"></span>&nbsp;Add
                    User</b-button>
                 
            </div>
            <div class="container pd-20">
                <UserTable :change="change" @view="onView" @change="onUpdateModal" @destroy="destroyData" />
            </div>
        </div>

        <modal name="user-modal" height="auto"   adaptive draggable :clickToClose="false">
            <div class="modal-header ldeep wh">
                <h5 class="modal-title" id="exampleModalCenterTitle">User</h5>
                <button type="button" class="close" @click="offModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <UserForm :update="isUpdate" @update="updateData" :change="change" :add="add" :readonly="view" :def="form" @close="offModal" @store="storeData" @change="onChange" />
        </modal>

    </div>
</template>

<script>
    import {
        get
    } from "vuex-pathify";
    import UserTable from "./UserTable";
    import UserForm from "./UserForm";
    import UserView from "./UserView";
     import swal from 'sweetalert2'
    export default {
        name: "Root",
        /*-------------------------Load Component---------------------------------------*/
        components: {
            UserTable,
            UserForm,
            UserView
        },
        /*-------------------------Set Component---------------------------------------*/
        props: {},
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                change: '',
                form:{},
                view:false,
                add:false,

                isUpdate:false,
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
        computed: {},
        /*-------------------------Methods------------------------------------------*/
        methods: {
            onChange() {
                this.change = Math.random();
            },
            onView(value) {
                this.view= true;
                this.$modal.show('user-modal');
                this.form = value; 
                this.add = false; 
            },
            //Open Modal method for set data when update
            onUpdateModal(value) {
                this.view = false;
                this.$modal.show('user-modal');
                this.form = value; 
                this.add = false;

                 this.isUpdate = true;
            },
            //Open Modal method for add data
            onModal() {
                this.form = {};
                this.$modal.show('user-modal');
                this.add = true;
            },
            //Close Modal and reload data
            offModal() {
                this.$modal.hide('user-modal');
                this.view = false;
                this.isUpdate = false;
            },
            //getdefault form
            defaultForm() {
                this.form = {};
            },
            //Store data to vuex --post
            storeData: async function (value) {
                console.log(value);
                   let storeParams = {
                        name:'User',
                        url: 'setting/user',
                        form: value
                    }
                    this.data = await this.$store.dispatch('default/storeData', storeParams);
                    this.onChange(); 
                    this.offModal();
                    this.defaultForm();

            },
            //Update data to vuex --put
            updateData: async function (value) {
                      console.log(value);
                   let storeParams = {
                        name:'User',
                        url: 'setting/user/'+value.id,
                        form: value
                    }
                    this.data = await this.$store.dispatch('default/updateData', storeParams);
                    this.onChange(); 
                    this.offModal();
                    this.defaultForm();
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
                        
               let storeParams = {
                        name:'User',
                        url: 'setting/user/'+value.id,
                        form: value
                    }
                    this.data =  this.$store.dispatch('default/destroyData', storeParams);
                    this.onChange(); 
                    this.offModal();
                    this.defaultForm();
                       
                    }
                    }) 
                   



            
            },
            /******* Methods default run ******/
            load: async function () {}
        }
    };
</script>