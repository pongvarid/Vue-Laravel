<!----------Make By YourName---------------->
<template>
    <div>
        <h1 class="nm">Choice Detail</h1>
        <b-button :class="_mbs('navbar') + ' btn round'" @click="onModal()">Add Choice</b-button>

        <hr>

        <model-list-select v-model="select" :list="Object.values(selectData())" :on-change="setType()" option-value="name"
            option-text="name" placeholder="select item">
        </model-list-select>


        <br><br>
        <table class="table table-hover">
            <thead>
                <tr class="lnav-deep wh">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="choices in choice">
                    <th v-if="choices.type == convert() && choices.value != null " scope="row">{{choices.id}}</th>
                    <th v-if="choices.type == convert() && choices.value != null " scope="row">{{choices.name}}</th>
                    <th v-if="choices.type == convert() && choices.value != null " scope="row">{{choices.type}}</th>
                    <td v-if="choices.type == convert() && choices.value != null ">
                        <b-btn v-if="choices.type == convert() && choices.value != null " @click="onUpdateModal(choices)"
                            class="lpop round" style="border:none;">Edit</b-btn>
                        <b-btn v-if="choices.type == convert() && choices.value != null " @click="destroyData(choices)"
                            style="border:none!important;" class="lnot round">Delete</b-btn>
                    </td>
                </tr>
            </tbody>
        </table>
        <modal name="detail-modal" height="290" resizable adaptive draggable :clickToClose="false">
            <div :class="_mbs('navbar') +' modal-header'">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Choice</h5>
                <button type="button" class="close" @click="offModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form @submit="storeData()" class="pd-20">
                            <input type="text" class="form-control mrt-10" placeholder="Name Choice" v-model="form.name"
                                required>
                            <input type="text" class="form-control mrt-10" placeholder="Other" v-model="form.other">
                            <input type="hidden" class="form-control mrt-10" placeholder="Other" v-model="form.type">
                            <center>
                                <b-button class="circle lnav-deep btn-lg wd200 mrt-10" type="submit">Done</b-button>
                            </center>
                        </form>
                    </div>
                </div>

            </div>
        </modal>

    </div>
</template>

<script>
    import {
        ModelListSelect
    } from 'vue-search-select'
    import _ from 'lodash'
    import {
        get
    } from "vuex-pathify";
    import swal from 'sweetalert2'

    export default {
        name: 'Root',
        /*-------------------------Load Component---------------------------------------*/
        components: {
            ModelListSelect
        },
        /*-------------------------Set Component---------------------------------------*/
        props: {

        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                form: {},
                updated: false,
                select: null,

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
            choice: get('Choice/choice'),
            _re: get('setting/getFind'),
             _mbs: get("setting/setValue"), 

        },
        /*-------------------------Methods------------------------------------------*/
        methods: {
            setType() {
                this.form.type = this.convert(this.select);
            },
            convert() {
                let u = this._re(this.select);
                try {
                    return u.type;
                } catch (error) {
                    return '';
                }
            },
            selectData() {

                let uu = _.filter(this.choice, {
                    'value': null,
                });
                return uu;
            },
            //Open Modal method for set data when update
            onUpdateModal(params) {
                if (this.select && this.form.type != null) {
                    this.form = params;
                    this.$modal.show('detail-modal');
                    this.updated = true;
                } else {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            },
            //Open Modal method for add data
            onModal() {
                if (this.select && this.form.type != '') {
                    this.$modal.show('detail-modal');
                } else {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            },
            //Close Modal and reload data
            offModal() {
                this.$modal.hide('detail-modal');
                this.load();
                this.defaultForm();
                this.updated = false;
            },
            //getdefault form
            defaultForm() {
                this.form = {};
            },
            //Store data to vuex --post
            storeData: async function () {

                if (!this.updated) {
                    await this.$store.dispatch('ChoiceDetail/storeData', this.form);
                } else {
                    this.updateData();

                }
                this.offModal();

            },
            //Update data to vuex --put
            updateData: async function () {
                await this.$store.dispatch('ChoiceDetail/updateData', this.form);
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
                        this.$store.dispatch('ChoiceDetail/destroyData', params);
                        this.offModal();
                    }
                })

            },

            /******* Methods default run ******/
            load: async function () {
                await this.$store.dispatch('Choice/getData');
                this.selectData();

            }
        },
    }
</script>