import axios from "axios"
import _ from 'lodash'
const state = {

  permission:{},

}

const getters = {

    


}

const mutations = {



}

const actions = {
    async getData() {
        let load = axios.get('/api/mbs/root/permission')
            .then((r) => {
                state.permission = r.data
            }).catch((e) => {});
    },
    async storeData(context,params) {
        let load = axios.post('/api/mbs/root/permission',params)
            .then((r) => {
                alert('Save Data Success');
            }).catch((e) => {
                alert("Error Save");
            });
    },

    async updateData(context,params) {
        let load = axios.put('/api/mbs/root/permission/'+params.id,params)
            .then((r) => {
                alert('Update Data Success');
            }).catch((e) => {
                alert("Error Update");
            });
    },

    async destroyData(context,params) {
        let load = axios.delete('/api/mbs/root/permission/'+params.id)
            .then((r) => {
                alert('Delete Data Success');
            }).catch((e) => {  alert("Error Delete");});
    },
     

}


export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}