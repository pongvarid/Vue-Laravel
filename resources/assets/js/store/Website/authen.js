import axios from "axios"
import _ from 'lodash'
const state = {
 
    login:false
    
}

const getters = {

    getLogin: (state) => (params) => {
        state.login = params;
     }, 
}

const mutations = {
 
}

const actions = {
  


}


export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}