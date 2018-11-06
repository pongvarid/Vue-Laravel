import axios from "axios"
import _ from 'lodash'
const state = {
    val:{},
    
    test:'',
}

const getters = {

    getTest: (state) => (params) => {
        state.test = params;
     },

     cal: (state) => (x,y) => {
        return Number(x)+Number(y);
     }


}

const mutations = {
 
}

const actions = {
 
    async getData() {
        let load = axios.get('/api/mbs/setting')
            .then((r) => {
                state.val = r.data
            }).catch((e) => {

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