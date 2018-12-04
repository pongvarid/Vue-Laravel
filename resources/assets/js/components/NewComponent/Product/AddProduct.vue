<!----------Make By YourName---------------->
 <template>
<div>
    <div class="card shadow-bl ">
            <div class="card-header wh ldeep fs18">
                Product List
                <b-button @click="onModal()" class="btn lsea round bl change-right "><span class="mdi mdi-plus-circle"></span>&nbsp;Add
                    Product</b-button>
            </div>
            <div >
            <br>
            <ProductList ref="lists" :dataIn="dataIn"   @change="onUpdateModal" @view="read" @destroy="destroyData" />
            <br><br>
            </div>
        </div>
        <!----------------------------------Management Data---------------------------------------------------->
 <modal name="add-product" style="overflow-y: auto;" height="auto" adaptive draggable :clickToClose="false">
            <b-form @submit="storeData()" >
            <div class="modal-header lblue wh">
                <h5 class="modal-title" v-if="updated && !view" id="exampleModalCenterTitle">Edit Product</h5>
                <h5 class="modal-title" v-else-if="!updated && !view" id="exampleModalCenterTitle">Add Product</h5>
                <h5 class="modal-title" v-else id="exampleModalCenterTitle">Product</h5>
                <button type="button" class="close" @click="offModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <br>
                <!-----------------------Input---------------------------------------------------->
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="container">
                            <Input :disabled="readonly" label="Product Name" v-model="form.product_name" :def="form.product_name" cover="cover" :required="true" />
                            <Input :disabled="readonly" label="Product Code" v-model="form.product_code" :def="form.product_code" cover="cover" :required="true"/>
                            <Input :disabled="readonly" label="Product Type" v-model="form.product_type" :def="form.product_type" cover="cover" :required="true"/>
                            <Input :disabled="readonly" label="Product Description" v-model="form.product_description" :def="form.product_description" cover="cover" :required="true" />   
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer" v-if="view == false">
                <button type="button" @click="offModal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  @submit="storeData()"  type="submit" class="btn btn-primary">Save</button>
            </div>
            </b-form>
      
        </modal>
    </div>
</template>

    <script>
import { get } from "vuex-pathify";
import Input from "../../MbsComponent/Input";
import Area from "../../MbsComponent/Textarea";
import ProductList from "./ProductList";
import swal from "sweetalert2";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    Input,
    Area,
    ProductList
  },
  /*-------------------------Set Component---------------------------------------*/
  props: {},
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
      form: {},
      data: {},
      updated: false,
      view: false,
      i: true,

      dataIn: {},
      readonly:false,
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
    load: async function() {
      let x = {
        url: "product"
      };
      this.data = await this.$store.dispatch("default/getData", x);
      console.log(this.data);
      this.getDataIn();
    },

    getDataIn: async function() {
      let x = {
        url: "mbs/table/multi/product"
      };
      this.dataIn = await this.$store.dispatch("default/getData", x);
    },
    read(value) {
      this.form = value;
      this.view = true;
      this.readonly = true;
      this.$modal.show("add-product");
    },
    hello(value) {
      alert(value);
    },
    //Open Modal method for set data when update
    onUpdateModal(value) {
      this.$modal.show("add-product");
      this.updated = true;
      this.form = value;
    },
    //Open Modal method for add data
    onModal() {
      this.$modal.show("add-product");
    },
    //Close Modal and reload data
    offModal() {
      this.$modal.hide("add-product");
      this.defaultForm();
      this.updated = false;
      this.view = false;
      this.load();
      this.i = true;
      this.getDataIn();
       this.readonly = false;
    },
    //getdefault form
    defaultForm() {
      let x = {
        url: "mbs/form/product"
      };
      this.form = this.$store.dispatch("default/getData", x);
    },
    //Store data to vuex --post
    storeData: async function() {
      if (!this.updated) {
        let storeParams = {
          url: "product",
          form: this.form
        };
        this.data = await this.$store.dispatch(
          "default/storeData",
          storeParams
        );
        this.offModal();
      } else {
        this.updateData();
      }
    },
    //Update data to vuex --put
    updateData: async function() {
      let updateParams = {
        url: "product/" + this.form.id,
        form: this.form
      };
      this.data = await this.$store.dispatch(
        "default/updateData",
        updateParams
      );
      this.i = false;
      this.offModal();
    },
    //Delete data to vuex --delete
    destroyData: async function(value) {
      swal({
        title: "Are you sure?",
        text: "You won't be delete your branch?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          let destroyParams = {
            url: "product/" + value.id,
            form: value
          };
          this.data = this.$store.dispatch(
            "default/destroyData",
            destroyParams
          );
          this.offModal();
        }
      });
    }
  }
};
</script>