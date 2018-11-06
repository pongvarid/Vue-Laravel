import axios from 'axios'
import _ from 'lodash'
import swal from 'sweetalert2'
const state = {
    user:{}
}
const getters = {

}

const mutations = {

}

const actions = {
    async getData() {
        let load = axios.get('/api/user/all')
            .then((r) => {
                state.user = r.data;
            }).catch((e) => {

            });
    },
    async storeData(context, params) {
        let load = axios.post('/api/register', params)
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
        let load = axios.post('/api/update', params)
            .then((r) => {
                swal({
                    type: 'success',
                    title: 'Success...',
                    title: 'Update data finish', 
                  })
            }).catch((e) => {
                swal({
                    type: 'error',
                    title: 'Oops...', 
                    title: 'Update data error', 
                  })
            });
    },

    async destroyData(context, params) {
        let load = axios.post('/api/delete',params)
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
                    title: 'Delete data finish', 
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