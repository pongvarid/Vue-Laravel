import axios from 'axios'
import _ from 'lodash'
const state = {

}
const getters = {

}

const mutations = {

}

const actions = {
async getData() {
let load = axios.get('')
    .then((r) => {

    }).catch((e) => {

});
    },
async storeData(context, params) {
    let load = axios.post('', params)
    .then((r) => {
        alert('Save Data Success');
    }).catch((e) => {
        alert('Error Save');
    });
},

async updateData(context, params) {
    let load = axios.put('' + params.id, params)
        .then((r) => {
        alert('Update Data Success');
    }).catch((e) => {
        alert('Error Update');
    });
},

async destroyData(context, params) {
    let load = axios.delete('' + params.id)
        .then((r) => {
        alert('Delete Data Success');
    }).catch((e) => {
        alert('Error Delete');
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