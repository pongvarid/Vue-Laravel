<!----------Make By YourName---------------->
 <template>
  <div>
    <div class="card shadow-bl">
      <div class="card-header wh ldeep fs18">Supplier List
        <b-button @click="onModal()" class="btn lsea round bl change-right">
          <span class="mdi mdi-plus-circle"></span>&nbsp;Add
          Supplier
        </b-button>
      </div>
      <div>
        <br>
        <SupplierList
          ref="lists"
          :dataIn="dataIn"
          @change="onUpdateModal"
          @view="read"
          @destroy="destroyData"
        />
        <br>
        <br>
      </div>
    </div>
    <!----------------------------------Management Data---------------------------------------------------->
    <modal
      name="add-supplier"
      style="overflow-y: auto;"
      height="auto"
      adaptive
      draggable
      :clickToClose="false"
    >
      <b-form @submit="storeData()">
        <div class="modal-header lblue wh">
          <h5 class="modal-title" v-if="updated && !view" id="exampleModalCenterTitle">Edit Supplier</h5>
          <h5
            class="modal-title"
            v-else-if="!updated && !view"
            id="exampleModalCenterTitle"
          >Add Supplier</h5>
          <h5 class="modal-title" v-else id="exampleModalCenterTitle">Supplier</h5>
          <button type="button" class="close" @click="offModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">Supplier Information</h2>
            </div>
            <div class="col-sm-6 col-12">
              <div class="container">
                <SelectTable
                  :required="true"
                  table="branch"
                  v-model="form.branch_id"
                  :def="form.branch_id"
                  cover="Branch"
                  :disabled="readonly"
                />
                <Select
                  :required="true"
                  name="Salutation"
                  cover="Salutation"
                  v-model="form.mbs_choice_id"
                  :def="form.mbs_choice_id"
                  :disabled="readonly"
                />
                <br>
                <Input
                  label="First Name"
                  v-model="form.first_name"
                  :def="form.first_name"
                  cover="cover"
                  :required="true"
                />
                <Input
                  label="Middle Name"
                  v-model="form.middle_name"
                  :def="form.middle_name"
                  cover="cover"
                  :required="true"
                />
                <Input
                  label="Last Name"
                  v-model="form.last_name"
                  :def="form.last_name"
                  cover="cover"
                  :required="true"
                />
                <Input
                  label="Suffix"
                  v-model="form.suffix"
                  :def="form.suffix"
                  cover="cover"
                  :required="true"
                />
                <Input
                  label="Birthday"
                  v-model="form.birthday"
                  :def="form.birthday"
                  cover="cover"
                  :required="true"
                  :date="true"
                />
                <Input
                  label="Favorite"
                  v-model="form.favorite"
                  :def="form.favorite"
                  cover="cover"
                  :required="true"
                />
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <Input
                label="Company Name"
                v-model="form.company_name"
                :def="form.company_name"
                cover="cover"
                :required="true"
              />
              <Input
                label="Position"
                v-model="form.position"
                :def="form.position"
                cover="cover"
                :required="true"
              />
              <Input
                label="Department"
                v-model="form.department"
                :def="form.department"
                cover="cover"
                :required="true"
              />
              <Input
                label="Email"
                v-model="form.email"
                :def="form.email"
                cover="cover"
                :required="true"
              />
              <Input
                label="Phone"
                v-model="form.phone"
                :def="form.phone"
                cover="cover"
                :required="true"
              />
              <Input
                label="Mobile"
                v-model="form.mobile"
                :def="form.mobile"
                cover="cover"
                :required="true"
              />
              <Input label="Fax" v-model="form.fax" :def="form.fax" cover="cover" :required="true"/>
            </div>

            <div class="col-12">
              <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">Address Information</h2>
            </div>
            <div class="col-sm-6 col-12">
              <div class="container">
                <Input
                  label="Mailing Address"
                  v-model="form.mailing_address"
                  :def="form.mailing_address"
                  cover="cover"
                />
                <Input
                  label="Mailing Street"
                  v-model="form.mailing_street"
                  :def="form.mailing_street"
                  Description
                  cover="cover"
                />
                <Input
                  label="Mailing City"
                  v-model="form.mailing_city"
                  :def="form.mailing_city"
                  cover="cover"
                />
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="container">
                <Input
                  label="Mailing State/Province"
                  v-model="form.mailing_state"
                  :def="form.mailing_state"
                  cover="cover"
                />
                <Input
                  label="Mailing zip code"
                  v-model="form.mailing_zipcode"
                  :def="form.mailing_zipcode"
                  cover="cover"
                />
                <Input
                  label="Mailing Country"
                  v-model="form.mailing_country"
                  :def="form.mailing_country"
                  cover="cover"
                />
                <Input
                  label="Mailing Remark"
                  v-model="form.remark"
                  :def="form.remark"
                  cover="cover"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer" v-if="view == false">
          <button
            type="button"
            @click="offModal()"
            class="btn btn-secondary"
            data-dismiss="modal"
          >Close</button>
          <button @submit="storeData()" type="submit" class="btn btn-primary">Save</button>
        </div>
      </b-form>
    </modal>
  </div>
</template>

    <script>
import { get } from "vuex-pathify";
import Input from "../../MbsComponent/Input";
import Area from "../../MbsComponent/Textarea";
import Select from "../../DefaultComponent/Select";
import SelectTable from "../../DefaultComponent/SelectTable";
import SupplierList from "./SupplierList";
import swal from "sweetalert2";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    Input,
    Area,
    SupplierList,
    Select,
    SelectTable
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

      dataIn: {}
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
  computed: {
    user: get("user/user"),
    _get: get("setting/getValue"),
    _mbs: get("setting/setValue"),
    userData: get("Login,userData")
  },
  /*-------------------------Methods------------------------------------------*/
  methods: {
    getId(id) {
      let user = JSON.parse(JSON.stringify(id));
      try {
        let id = user.user.id;
        return id;
      } catch (e) {}
    },
    /******* Methods default run ******/
    load: async function() {
      let x = {
        url: "supplier"
      };
      this.data = await this.$store.dispatch("default/getData", x);
      console.log(this.data);
      this.getDataIn();
    },

    getDataIn: async function() {
      let x = {
        url: "mbs/table/multi/supplier"
      };
      this.dataIn = await this.$store.dispatch("default/getData", x);
    },
    read(value) {
      this.form = value;
      this.view = true;
      this.$modal.show("add-supplier");
    },
    hello(value) {
      alert(value);
    },
    //Open Modal method for set data when update
    onUpdateModal(value) {
      this.$modal.show("add-supplier");
      this.updated = true;
      this.form = value;
    },
    //Open Modal method for add data
    onModal() {
      this.$modal.show("add-supplier");
      this.form.users_id = this.getId(this.userData);
    },
    //Close Modal and reload data
    offModal() {
      this.$modal.hide("add-supplier");
      this.defaultForm();
      this.updated = false;
      this.view = false;
      this.load();
      this.i = true;
      this.getDataIn();
    },
    //getdefault form
    defaultForm() {
      let x = {
        url: "mbs/form/supplier"
      };
      this.form = this.$store.dispatch("default/getData", x);
    },
    //Store data to vuex --post
    storeData: async function() {
      if (!this.updated) {
        let storeParams = {
          url: "supplier",
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
        url: "supplier/" + this.form.id,
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
        text: "You won't be delete your Supplier?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          let destroyParams = {
            url: "supplier/" + value.id,
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