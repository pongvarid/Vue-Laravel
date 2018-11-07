<!----------Make By YourName---------------->
<template>
    <div>
        <h2>User Management</h2>
        <b-btn @click="onModal()" class="btn btn-light lbtn-sea no-border circle"><span class="fa fa-plus-circle"></span>
            &nbsp;Add User</b-btn>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr class="lnav-deep wh">
                    <th scope="col">Id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="User in user">
                    <th scope="row">{{User.id}}</th>
                    <td>{{User.email}}</td>
                    <td>{{User.name}}</td>
                    <td>{{_get(User.permission)}}</td>
                    <td>
                        <b-btn @click="onUpdateModal(User)" class="lbtn-deep circle" style="border:none;">Edit</b-btn>
                        <b-btn @click="destroyData(User)" style="border:none;" class="lbtn-not circle">Delete</b-btn>
                    </td>
                </tr>
            </tbody>
        </table>
        <modal name="user-modal" height="340" resizable adaptive draggable :clickToClose="false">
            <div class="modal-header lnav-deep wh">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" @click="offModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <b-container>
                <div class='row'>
                    <div class="col-12">
                        <form @submit="storeData()" class="pd-20">
                            <input type="text" class="form-control mrt-6" placeholder="Name" v-model="form.name"
                                required>
                            <input type="text" class="form-control mrt-6" placeholder="Email" v-model="form.email"
                                required>
                            <input v-if="!updated" type="text" class="form-control mrt-6" placeholder="Password" v-model="form.password"
                                required>
                            <Select class="mrt-6" name="UserPermission" :v="form.permission" v-model="form.permission" />
                            <br>
                             <center> <b-btn v-if="form.permission"  class="btn-lg wd100 pd-10 lnav-deep f30 wh circle"  type="submit">Done</b-btn></center> <br><br>
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
                form: {},
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
                this.form = {};
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