import axios from 'axios'
import _ from 'lodash'
import swal from 'sweetalert2'
const state = {
    userData:'',
    userToken:localStorage.getItem('user-token') || ''
}
const getters = {

}

const mutations = {

}

const actions = {

        async getToken(){
            let storage = window.localStorage;
            axios.defaults.headers.common['Authorization'] = `Bearer ${storage.getItem('user-token')}`; 
        },
 
        async Login(context, params) {
            let load = axios.post('/login', params)
            .then((r) => {
               // alert(r.data.token);
                //state.userToken =  r.data.token;
                localStorage.setItem('user-token', r.data.token) 
                actions.getToken();
                actions.getUserData();
                return true;
            }).catch((e) => {
                swal({
                    type: 'warning',
                    title: 'Cannot Login',
                    text: 'Check Your Username or Password and try agian.', 
                     })
               return false;
            });
         
        },

        async getUserData(context,params){ 
            actions.getToken();
            let load = axios.get('/user')
            .then((r) => { 
                state.userData =  r.data; 
                
            }).catch((e) => {
                swal({
                title: "Network Error",
                text: "Remove data from database success.",
                imageUrl: "https://cdn1.iconfinder.com/data/icons/icons-for-a-site-1/64/advantage_cloud-128.png",
                imageWidth: 160,
                imageHeight: 160,
                })
            }); 
            
        },

        async logout(context,params){
            localStorage.removeItem("user-token") 
            
        }
        

}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
    }