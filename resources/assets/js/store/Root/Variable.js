import axios from 'axios'
import _ from 'lodash'
import swal from 'sweetalert2'

const state = {
    variable: {},
}
const getters = {

}

const mutations = {

}

const actions = {
    async getData() {
        let load = axios.get('/api/mbs/setting/')
            .then((r) => {
                state.variable = r.data;
            }).catch((e) => {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            });
    },
    async storeData(context, params) {
        let load = axios.post('/api/mbs/setting', params)
            .then((r) => {
                swal({
                    type: 'success',
                    title: 'Success...',
                    title: 'Your work has been finish',
                })
            }).catch((e) => {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            });
    },

    async updateData(context, params) {
        let load = axios.put('/api/mbs/setting/' + params.id, params)
            .then((r) => {
                swal({
                    type: 'success',
                    title: 'Success...',
                    title: 'Your work has been finish',
                })
            }).catch((e) => {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            });
    },

    async destroyData(context, params) {
        let load = axios.delete('/api/mbs/setting/' + params.id)
            .then((r) => {
                swal({
                    title: "Delete Success",
                    text: "Remove data from database success.",
                    imageUrl: "https://cdn1.iconfinder.com/data/icons/appicns/513/appicns_Trash_Full.png",
                    imageWidth: 160,
                    imageHeight: 160,
                })
            }).catch((e) => {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            });
    },

}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}