import axios from "axios"
 
const state = {
 
    test:{},

}

const getters = { 
   
  
}



const actions = { 
     
    async getData(context, params) { 

        let result = await axios.get('/api/mbs/table/test')
          .then(async (response) => {  
            console.log('sad','loadSuccess');
            console.log('sad',response.data);
            state.test = response.data;
            return response.data;
          })
          .catch((error) => { 
            console.log('sad', error.response.data);
            return null;
          });
    
        return result
      },
    

}

const mutations = {


}


export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}