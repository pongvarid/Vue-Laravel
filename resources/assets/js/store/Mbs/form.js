import axios from 'axios'
import _ from 'lodash'
const state = {

}
const getters = {

}

const mutations = {

}

const actions = {
async getData(context, params) {
let load = axios.get('/api/mbs/form/account/'+params    )
        .then((r) => {
            return r.data;
        }).catch((e) => {

        });
        return load;
    }, 
 
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
    }