<!----------Make By YourName---------------->
 <template>
<div>
<b-form @submit="storeData()" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="container"><br>
                        <Input label="Subject" v-model="form.subject" :def="form.subject" cover="cover" :required="true" />
                        <Input label="Due Date" v-model="form.due_date" :def="form.due_date" cover="cover" :date="true" :required="true" />
                        <SelectTable   :required="true" table="users" v-model="form.users_id" :def="form.users_id"
                            cover="Assigned To" :disabled="readonly" /> 
                        <SelectTable   :required="true" table="contact" v-model="form.contact_id" :def="form.contact_id"
                            cover="Name" :disabled="readonly" /> 
                        <SelectTable   :required="true" table="account" v-model="form.account_id" :def="form.account_id"
                            cover="Related to" :disabled="readonly" /> 
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" v-if="view == false">
            <button type="button" @click="offModal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button  @submit="storeData()"  type="submit" class="btn btn-primary">Save</button>
        </div>
    </b-form>
</div>
</template>

    <script>
import { get } from "vuex-pathify";
import Input from "../../../MbsComponent/Input";
import Area from "../../../MbsComponent/Textarea";
import SelectTable from "../../../DefaultComponent/SelectTable";
import swal from "sweetalert2";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    Input,
    Area,
    SelectTable
  },
  /*-------------------------Set Component---------------------------------------*/
  props: {
    def: {},
    readonly: false,
    add: false,
    change: ""
  },
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
    _mbs: get("setting/setValue")
  },
  watch: {
    change(value) {
      this.load();
    },
    def(value) {
      this.form = value;
      console.log(value);
    }
  },
  /*-------------------------Methods------------------------------------------*/
  methods: {
    getMessage(txt, show) {
      this.message.show = show;
      this.message.txt = txt;
    },

    submit() {
      if (this.form.contact_id == "") {
        this.getMessage("Please Choose Contact Name", true);
      } else if (this.form.account_id == "") {
        this.getMessage("Please Choose Account Name", true);
      } else {
        this.getMessage("", false);
        this.$emit("store", this.form);
      }
    },
    /******* Methods default run ******/
    load: async function() {
      
    },
    read(value) {
      this.form = value;
      this.view = true;
    },
    hello(value) {
      alert(value);
    } 
  }
};
</script>