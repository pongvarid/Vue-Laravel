<!----------Make By YourName---------------->
 <template>
<div>
     <i class="mdi mdi-plus-circle fs60" @click="onModal()" style="color:blue; float:right"></i>

    <modal name="add-company" resizable adaptive draggable :clickToClose="false">
    <div class="modal-header lblue wh">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Company</h5>
        <button type="button" class="close" @click="offModal()">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="container">
        <input type="text" class="form-control">
    </div>
    </modal>

    </div>
</template>

    <script>
export default {
    name: 'Root',
    /*-------------------------Load Component---------------------------------------*/
    components: {

    },
  /*-------------------------Set Component---------------------------------------*/
props:{

},
    /*-------------------------DataVarible---------------------------------------*/
    data() {
    return {

        };
    }, 
    /*-------------------------Run Methods when Start this Page------------------------------------------*/
     async mounted() {
    /**** Call loading methods*/
            this.load(); 
    },
    /*-------------------------Run Methods when Start Routed------------------------------------------*/
     async beforeRouteEnter(to, from, next) { 
        next()
    },
    /*-------------------------Vuex Methods and Couputed Methods------------------------------------------*/
    computed:{

},
    /*-------------------------Methods------------------------------------------*/
methods:{
     //Open Modal method for set data when update
     onUpdateModal(params) { 
    
    },
    //Open Modal method for add data
    onModal() {
        this.$modal.show('add-company');
    },
    //Close Modal and reload data
    offModal() {
        this.$modal.hide('add-company');
    }, 
    //getdefault form
    defaultForm() {
    
    },
    //Store data to vuex --post
     storeData: async function () {
    
    },
    //Update data to vuex --put
    updateData: async function () {
    
    },
      //Delete data to vuex --delete
    destroyData: async function (params) {
    
     },
    /******* Methods default run ******/
    load:async function(){
}
},
    }
</script>