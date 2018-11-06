import axios from 'axios'
import _ from 'lodash'
const state = {
    navbar:false,
    active:'',
    slide:true,
}
const getters = {

    changeSlide: (state) => (params) => {
        state.slide = params;
     }, 

     changeActive: (state) => (params) => {
        state.active = params;
     }, 

     changeNavbar: (state) => (params) => {
        state.navbar = params;
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