import axios from "axios"
import _ from 'lodash'
const state = {

    setting: {},
    home: 'hello',
    navigation:false,
    navSlide:false,
    choice:{},

}

const getters = {

    navOn: (state) => (step) => {
    
            state.navSlide = step;
        
    },

  
    naviOn: (state) => (step) => {
    
        state.navigation = step;
    
        },
    navigationChange: (state) => () => {
        if(state.navigation){
            state.navigation = true;
        }else{
            state.navigation = false;
        }
    },

    setObject: (state) => (name) => {
        try {
            return _.find(state.setting, {
                'name': name,
            });
        } catch (error) {
            return "noVal";
        }
        
        
    },

    setValue: (state) => (name) => {
        try {
            
        return _.find(state.setting, {
            'name': name,
        }).value;
            
        } catch (error) {
        return "No Value in : "+name;
        }
    },

    getValue: (state) => (value) => {
        try {
            
        return _.find(state.choice, {
            'value': value,
        }).name;
            
        } catch (error) {
        return "No Value in : "+value;
        }
    },
    
    getFind: (state) => (value) => {
        try {
            
        return _.find(state.choice, {
            'name': value,
        }); 
        } catch (error) {
        return "No Value in : "+value;
        }
    },

}

const mutations = {



}

const actions = {
    async getData() {
        let load = axios.get('/api/mbs/setting')
            .then((r) => {
                state.setting = r.data
            }).catch((e) => {});
    },

    async xx() {
        return "asdasd";
    },

    async getChoice(){
        let load = await axios.get('/api/mbs/choice')
                        .then((r) => {
                            state.choice  = r.data
            }).catch((e) => {
                            alert('ล้มเหลว')
           });
    }

}


export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}