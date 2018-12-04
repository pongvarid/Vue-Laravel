<!----------Make By YourName---------------->
 <template>
 <div class="container-fluid"><br>
      <div class='row'>
      <div class='col-12'>
       <b-card class="shadow-bl circle">
                    <div class='row'>
                        <div class='col-12'>
                            <h3 class="fs30"> <i class="mdi mdi-shopping fs60 w3-hide-small"></i>&nbsp;&nbsp;Product</h3>
                        </div>
                        
                    </div>
                </b-card>
      </div>
      <div class='col-12'>
        <br>
          <AddProduct />
      </div>
      </div>
 </div>
</template>

    <script>
        import { get } from "vuex-pathify"; 
        import ProductList from '../components/NewComponent/Product/ProductList';
        import AddProduct from '../components/NewComponent/Product/AddProduct';
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    ProductList,
    AddProduct
    },
  /*-------------------------Set Component---------------------------------------*/
  props: {},
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
      time: '',
    };
  },
  /*-------------------------Run Methods when Start this Page------------------------------------------*/
  async mounted() {
    /**** Call loading methods*/
    this.load();
  },
  /*-------------------------Run Methods when Start Routed------------------------------------------*/
  async beforeRouteEnter(to, from, next) {
    next();
  },
  /*-------------------------Vuex Methods and Couputed Methods------------------------------------------*/
  computed: {},
  /*-------------------------Methods------------------------------------------*/
  methods: {
    /******* Methods default run ******/
    load: async function() {}
  }
};
</script>