<!----------Make By YourName---------------->
<template>
    <div>
        <h2>Permission of User</h2>
        <b-btn @click="onPermissionModal()" class="btn btn-light lbtn-sea no-border circle"><span class="fa fa-plus-circle"></span>
            &nbsp;Add Permission</b-btn>
        <hr>
        <ul class="w3-ul shadow mr-10 pd-10" v-for="per in permission">

            <li class="w3-display-container">
                <h3 class="fs25" @click="onUpdatePermissionModal(per)">{{per.name}} </h3>
                <h2 class="fs18">type: {{per.type}}</h2>
                <h2 v-if="per.name != 'UserPermission'" class="fs18">value: {{per.value}}</h2>
                <span v-if="per.name != 'UserPermission'" @click="destroyPermission(per)" class="w3-button w3-transparent w3-display-right">X</span>

            </li>

        </ul>
        <b-modal v-model="m_permission" hide-header hide-footer no-close-on-backdrop no-close-on-esc centered>
            <Button class="btn lbtn-not" @click="offPermissionModal()">X</Button>
            <div class="container">
                <b-form>
                    <input v-model="fromPermission.name" type="text" placeholder="Name Permission">
                    <input v-model="fromPermission.type" type="hidden" placeholder="type Permission">
                    <Button class="btn lbtn-ok" v-if="!updatedPermission" @click="storePermission()">Save</Button>
                    <Button class="btn lbtn-pop" v-if="updatedPermission" @click="updatePermission()">Update</Button>
                </b-form>
            </div>

        </b-modal>


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
                m_permission: false,
                m_user: false,

                fromPermission: {
                    type: '09'
                },
                updatedPermission: false,
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
            permission: get('permission/permission'),
        },
        /*-------------------------Methods------------------------------------------*/
        methods: {
            onUpdatePermissionModal(params) {
                this.fromPermission = params;
                this.updatedPermission = true;
                this.m_permission = true;
            },
            onPermissionModal() {
                this.m_permission = true;

            },
            offPermissionModal() {
                this.m_permission = false;
                this.updatedPermission = false;
                this.defaultFromPermission();
                this.load();
            },
            getPermissionValue() {
                let dd = this.permission.length;
                return dd;
            },
            defaultFromPermission() {
                this.fromPermission = {
                    type: '09'
                };
            },

            storePermission: async function () {
                await this.$store.dispatch('permission/storeData', this.fromPermission);
                this.offPermissionModal()
            },
            updatePermission: async function () {
                await this.$store.dispatch('permission/updateData', this.fromPermission);
                this.offPermissionModal()
            },
            destroyPermission: async function (params) {
                await this.$store.dispatch('permission/destroyData', params);
                this.offPermissionModal()
            },

            /******* Methods default run ******/
            load: async function () {
                await this.$store.dispatch('permission/getData');
                await this.$store.dispatch('user/getData');
            }
        },
    }
    
</script>