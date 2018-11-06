<template>

    <div>

        <b-modal v-model="dialog" hide-footer hide-header no-close-on-backdrop no-close-on-esc centered>
            <div class="container" style="border-radius:50px;">
                <div class="row">
                    <div class="col-4 pdt-6">
                        <img height="90" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/f1055231234507.564a1d234bfb6.gif" alt="">
                    </div>
                    <div class="col-8 pdt-28 ">
                        <h3>Loading</h3>
                    </div>
                </div>

            </div>
        </b-modal>

    </div>


</template>

<script>
    import {
        get
    } from 'vuex-pathify'

    export default {
        computed: { 
                 
            dialog: get("loading/isLoad")
        },
        methods: {

        }
    }
</script>