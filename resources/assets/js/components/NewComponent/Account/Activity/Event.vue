<!----------Make By YourName---------------->
 <template>
<div>
<b-form @submit="storeData()" >
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="container"><br>
                        <Input label="Subject" v-model="form.subject" :def="form.subject" cover="cover" :required="true" />
                        <Select :required="true" name="Event Type" cover="Event Type" v-model="form.mbs_choice_id"   :def="form.mbs_choice_id" :disabled="readonly" /><br>
                        <Input label="Description" v-model="form.description" :def="form.description" cover="cover" :required="true" />
                        <Input label="Start" v-model="form.start" :def="form.start" cover="cover" :date="true" :required="true" />
                        <Input label="End" v-model="form.end" :def="form.end" cover="cover" :date="true" :required="true" />
                        <Input label="Location" v-model="form.location" :def="form.location" cover="cover" :required="true" />
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
import Select from "../../../DefaultComponent/Select";
import swal from "sweetalert2";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    Input,
    Area,
    SelectTable,
    Select
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