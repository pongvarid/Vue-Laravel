<!----------Make By YourName---------------->
<template>
    <div>
        <h2>User Management</h2>
        <b-btn @click="onModal()" :class="'btn no-border round wh ' + _mbs('theme')"><span class="fa fa-plus-circle"></span>
            &nbsp;Add User</b-btn>
        <hr>
        <table :class="'table table-hover '">
            <thead>
                <tr :class="'lnav-deep wh ' + _mbs('theme')">
                    <th scope="col">Id</th>
                    <th scope="col">Email</th>
                    <th scope="col">fullname</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="User in user">
                    <th scope="row">{{User.id}}</th>
                    <td>{{User.email}}</td>
                    <td>{{User.fullname}}</td>
                    <td>{{_get(User.permission)}}</td>
                    <td>
                        <b-btn @click="onUpdateModal(User)" class="ldeep round" style="border:none;">Edit</b-btn>
                        <b-btn @click="destroyData(User)" style="border:none;" class="lnot round">Delete</b-btn>
                    </td>
                </tr>
            </tbody>  
        </table>
        <modal name="user-modal" height="auto" resizable adaptive draggable :clickToClose="false">
            <div :class=" 'modal-header wh '+_mbs('theme') ">
                <h5 class="modal-title" id="exampleModalCenterTitle">User Management</h5>
                <button type="button" class="close" @click="offModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <b-container>
                <div class='row'>
                    <div class="col-12"> 
                        <form @submit="storeData()" class="pd-20">
                             <Select class="mrt-6" name="UserPermission" :v="form.permission" v-model="form.permission" /><br>
                           
                             <Input v-model="form.fullname" :def="form.fullname" label="Name" cover="  "/>
                             <Input v-model="form.username"  :def="form.username"  label="Username" cover="  "/>
                             <Input v-model="form.email"  :def="form.email"  label="email" cover="  "/>
                             <Input v-if="!updated"  v-model="form.password" label="Password" cover="  "/>
  
                            <br>
                             <center> <b-btn v-if="form.permission"  :class="'btn-lg wd100 pd-10 f30 wh round '+ _mbs('theme') "  type="submit">Done</b-btn></center> <br><br>
                        </form>

                    </div>
                </div>
            </b-container>
        </modal>
    </div>
</template>

<script>
    import {
        get
    } from "vuex-pathify";
    import Select from '../../../components/DefaultComponent/Select.vue';
    import Input from '../../../components/MbsComponent/Input';
    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            Select,Input
        },
        /*-------------------------Set Component---------------------------------------*/
        props: {

        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                form: {
                   
                },
                updated: false,

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
            user: get('user/user'),
            _get: get("setting/getValue"),
             _mbs: get('setting/setValue'), 
        },
        /*-------------------------Methods------------------------------------------*/
        methods: {
            //Open Modal method for set data when update
            onUpdateModal(params) {
                 this.$modal.show('user-modal');
                 this.updated = true;
                 this.form = params;
            },
            //Open Modal method for add data
            onModal() {
                this.$modal.show('user-modal');
            },
            //Close Modal and reload data
            offModal() {
                this.$modal.hide('user-modal');
                this.defaultForm();
                this.updated = false;
                this.load();
            },
            //getdefault form
            defaultForm() {
                this.form = {  };
            },
            //Store data to vuex --post
            storeData: async function () {
                if (!this.updated) {

                    let store = this.$store.dispatch('user/storeData', this.form);
                    this.offModal();

                } else {
                    this.updateData();
                }
            },
            //Update data to vuex --put
            updateData: async function () {
                 let store = this.$store.dispatch('user/updateData', this.form);
                 this.offModal();
            },
            //Delete data to vuex --delete
            destroyData: async function (params) {
                this.$swal({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: 'blue',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                            if (result.value) {
                                let store = this.$store.dispatch('user/destroyData',params);
                                  this.offModal();
                            }
                            })
             
            },

            /******* Methods default run ******/
            load: async function () {
                await this.$store.dispatch('user/getData');


            }
        },
    }
</script>