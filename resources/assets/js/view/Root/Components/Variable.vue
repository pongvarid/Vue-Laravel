<!----------Make By YourName---------------->
<template>
    <div>
        <h1 class="nm">Varible Managment</h1>
        <b-button :class="'btn round ' + _mbs('navbar')" @click="onModal()">Add Varible</b-button> <hr>
        <table class="table table-hover">
            <thead>
                <tr :class="_mbs('navbar')">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Value</th>
                      <th scope="col">Description</th>
                    <th scope="col">Other</th>
                    <th scope="col">Permission</th>
                     <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="val in variable">
                    <th scope="row">{{val.id}}</th>
                    <th scope="row">{{val.name}}</th>
                    <th scope="row">{{val.value}}</th>
                       <th scope="row">{{val.description}}</th>
                    <th scope="row">{{val.other}}</th>
                    <th scope="row">
                        <span v-if="val.permission == 0" class="nm" style="color:red;">Lock</span>
                    <span class="nm" v-if="val.permission == 1"  style="color:green;">Unlock</span>
                    </th>
                    <td>
                        <b-btn @click="onUpdateModal(val)" class="lpop round" style="border:none;">Edit</b-btn>
                        <b-btn v-if="val.permission == 1" @click="destroyData(val)" style="border:none;" class="lnot round">Delete</b-btn>
                    </td>
                </tr>
            </tbody>
        </table>
        <modal name="variable-modal" height="340" resizable adaptive draggable :clickToClose="false">
            <div :class="_mbs('navbar')+ ' modal-header'" >
                <h5 class="modal-title" id="exampleModalCenterTitle">Varible</h5>
                <button type="button" class="close" @click="offModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <form @submit="storeData()" class="pd-20">
                    <input type="text" class="form-control mrt-6" placeholder="Name" v-model="form.name" required>
                    <input type="text" class="form-control mrt-6" placeholder="Value" v-model="form.value" required>
                    <input type="text" class="form-control mrt-6" placeholder="Description" v-model="form.description">
                    <input type="text" class="form-control mrt-6" placeholder="Other" v-model="form.other" ><br>
                    <center>
                        <b-btn class="btn-lg wd100 pd-10 lnav-deep f30 wh circle" type="submit">Done</b-btn>
                    </center> <br><br>
                </form>
            </div>
        </modal>

    </div>
</template>

<script>
    import {
        get
    } from "vuex-pathify";
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
                form: { permission:'1'},
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
            variable: get('Variable/variable'),
             _mbs: get("setting/setValue"), 
        },
        /*-------------------------Methods------------------------------------------*/
        methods: {
            //Open Modal method for set data when update
            onUpdateModal(params) {
                this.form = params;
                this.updated = true;
                this.$modal.show('variable-modal');
                
            },
            //Open Modal method for add data
            onModal() {
             
                this.$modal.show('variable-modal');
            },
            //Close Modal and reload data
            offModal() {
                this.defaultForm();
                this.load();
                this.updated = false;
                this.$modal.hide('variable-modal');
                
            },
            //getdefault form
            defaultForm() {
                this.form = {permission:'1' };
            },
            //Store data to vuex --post
            storeData: async function () {
                if(!this.updated){ 
                     this.$store.dispatch('Variable/storeData', this.form);
                     this.offModal();
                }else{
                    this.updateData();
                }
            },
            //Update data to vuex --put
            updateData: async function () {
                this.$store.dispatch('Variable/updateData', this.form);
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
                                let store = this.$store.dispatch('Variable/destroyData',params);
                                  this.offModal();
                            }
                            })
               
            },

            /******* Methods default run ******/
            load: async function () {
                this.$store.dispatch('Variable/getData');
            }
        },
    }
</script>