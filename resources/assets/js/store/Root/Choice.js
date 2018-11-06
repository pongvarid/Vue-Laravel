import axios from 'axios'
import _ from 'lodash'
import swal from 'sweetalert2'

const state = {
    choice:{},
}
const getters = {

}

const mutations = {

}

const actions = {
async getData() {
let load = axios.get('/api/mbs/choice')
    .then((r) => {
        state.choice = r.data;
    }).catch((e) => {

});
    },
async storeData(context, params) {
    let load = axios.post('/api/mbs/choice', params)
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
    let load = axios.put('/api/mbs/choice/' + params.id, params)
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
    let load = axios.delete('/api/mbs/choice/' + params.id)
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

}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
    }