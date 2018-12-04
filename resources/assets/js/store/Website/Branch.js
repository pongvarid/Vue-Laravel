import axios from 'axios'
import _ from 'lodash'
const state = {
    branch: {},
}
const getters = {

    getName: (state) => (id) => {
        try {
            
        return _.find(state.branch, {
            'id': id,
        }).name;
            
        } catch (error) {
        return "No Branch"
        }
    },

}

const mutations = {

}

const actions = {
    async getData() {
        let load = axios.get('api/setting/company/branch')
            .then((r) => {
                state.branch = r.data;
            }).catch((e) => {});
    },




}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}