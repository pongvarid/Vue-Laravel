import axios from 'axios'
import _ from 'lodash'
import swal from 'sweetalert2'
import store from '../vuex'; 
const state = {
    
}
const getters = {

}

const mutations = {

}

const actions = {
    async getData(context, params) {

        let load = axios.get('/api/' + params.url)
            .then((r) => { 
                return r.data;
            }).catch((e) => {
                alert('error load data');
            });
        return load;
    },
    async storeData(context, params) {
        let load = axios.post('api/' + params.url, params.form)
            .then((r) => {
                store.dispatch('alert/success',params.name);
            }).catch((e) => { 
                console.log(e);
                store.dispatch('alert/error',e);
            });
    },

    async updateData(context, params) {
        let load = axios.put('api/' + params.url, params.form)
            .then((r) => {
                store.dispatch('alert/success',params.name);
            }).catch((e) => {
                store.dispatch('alert/error',e);
            });
    },

    async destroyData(context, params) {
        let load = axios.delete('api/' + params.url)
            .then((r) => {
                store.dispatch('alert/success',params.name);
            }).catch((e) => {
                store.dispatch('alert/error',e);
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