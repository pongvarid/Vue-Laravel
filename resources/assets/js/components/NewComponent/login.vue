<template>
    <div>
        <input v-model="form.username" type="text" placeholder="Username">
        <input v-model="form.password"  type="text" placeholder="Password">
        <b-btn class="btn btn-success btnlg">Save</b-btn>
    </div>
</template>

<script>

    import {
        get
    } from "vuex-pathify"
    export default {
        name: 'CreateNote',
        components: {

        },
        props: {
            form:{}, 
        },
        data() {
            return {

            }
        },
        computed: {
            _mbs: get("setting/setValue"),
        },
        async beforeRouteEnter(to, from, next) {
         
            next()
        },
        mounted() {
            this.load();
        },
        methods: {
            load: async function () {}

        }
    }
</script>