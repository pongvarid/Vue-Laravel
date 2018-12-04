<!----------Make By YourName---------------->
 <template>
  <div class="card shadow-bl">
    <div class="card-header wh ldeep fs18">Detail
      <!--<b-button @click="onUpdateModal(data)" class="btn lsea round bl change-right">
        <span class="mdi mdi-grease-pencil"></span>&nbsp;Update Your Profile
      </b-button> -->
    </div>
    <div class="container">
      <div class=" row">
        <div class="col-md-5 col-12 mrt-30">
          <center>
            <img style="width:50%!important; height:auto;" :src="convertImg(data.img_company)" alt>
          </center>
        </div>
        <div class="col-md-5 col-12 mrt-30">
          <center>
            <h2>{{getUser(userData)}}</h2>
            <hr>
          </center>
          <div class="mrl-20">
            <ul v-for="datas,index in data" v-if="datas.id == getId(userData)">
              <h4 class="fs18">
                <b>
                  <i class="mdi mdi-account"></i> Username :
                </b>
                &nbsp; {{datas.username}}
              </h4>
              <h4 class="fs18">
                <b>
                  <i class="mdi mdi-format-align-center"></i> Fullname :
                </b>
                &nbsp; {{datas.fullname}}
              </h4>
              <h4 class="fs18">
                <b>
                  <i class="mdi mdi-home-modern"></i>Branch :
                </b>
                &nbsp; {{datas.branch.name}}
              </h4>
              <h4 class="fs18">
                <b>
                  <i class="mdi mdi-email"></i> Email :
                </b>
                &nbsp; {{datas.email}}
              </h4>
              <h4 class="fs18">
                <b>
                  <i class="mdi mdi-phone"></i> Phone :
                </b>
                &nbsp; {{datas.phone}}
              </h4>
            </ul>
            <!---<h4 class="fs18"><b>Currency :</b>&nbsp; Dolla </h4> ---->
            <hr>
            <br>
          </div>
        </div>
      </div>
    </div>
    <modal name="user-modal" height="auto" adaptive draggable :clickToClose="false">
      <div class="modal-header ldeep wh">
        <h5 class="modal-title" id="exampleModalCenterTitle">User Edit</h5>
        <button type="button" class="close" @click="offModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container row">
        <div class="col-sm-6 col-12">
          <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">User Image</h2>
          <div class="pd-10">
            <image-uploader :preview="false" :maxWidth="512" :quality="0.7" v-model="form.img_user"></image-uploader>
            <br>
            <center>
              <img class="wd120 hg120 round" :src="form.img_user" alt>
            </center>
          </div>
        </div>
        <div class="col-sm-6 col-12">
          <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">User Information</h2>
          <div class="pd-10">
            <b-form @submit="submit">
              <b-alert v-model="message.show" variant="danger" dismissible>{{message.txt}}</b-alert>
              <br>
            {{form.branch_id}}
              <Input
                :required="true"
                icon="mdi mdi-account"
                v-model="form.name"
                :def="form.name"
                label="Branch"
                cover="cover"
                :disabled="readonly"
              />

              <Input
                :required="true"
                icon="mdi mdi-account"
                v-model="form.username"
                :def="form.username"
                label="Username"
                cover="cover"
                :disabled="readonly"
              />

              <Input
                :required="true"
                icon="mdi mdi-pen"
                v-model="form.fullname"
                :def="form.fullname"
                label="Fullname"
                cover="cover"
                :disabled="readonly"
              />

              <Input
                :required="true"
                :email="true"
                icon="mdi mdi-email"
                v-model="form.email"
                :def="form.email"
                label="Email"
                cover="cover"
                :disabled="readonly"
              />

              <Input
                :required="true"
                icon="mdi mdi-phone"
                v-model="form.phone"
                :def="form.phone"
                label="Phone"
                cover="cover"
                :disabled="readonly"
              />

              <Input
                :password="true"
                v-if="(add)"
                v-model="form.password"
                label="New Password"
                cover="cover"
              />
              <Input
                :password="true"
                v-if="(add)"
                v-model="conf_password"
                label="Confirm Password"
                cover="cover"
              />

              <b-btn v-if="!readonly && !add" v-b-toggle="'password'" class="m-1 round lblue">
                <span class="mdi mdi-textbox-password"></span>&nbsp;Change
                Password
              </b-btn>

              <!-- element to collapse -->
              <b-collapse id="password">
                <b-card>
                  <Input
                    :password="true"
                    v-model="form.password"
                    label="New Password"
                    cover="cover"
                  />
                  <Input
                    :password="true"
                    v-model="conf_password"
                    label="Confirm Password"
                    cover="cover"
                  />
                </b-card>
              </b-collapse>
              <div class="modal-footer" v-if="!readonly ">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </b-form>
          </div>
        </div>
      </div>
    </modal>
  </div>
</template>

    <script>
import UpdateProfile from "./UpdateProfile";
import UserProfile from "./UserProfile";
import { ImageUploader } from "vue-image-upload-resize";
import { get } from "vuex-pathify";
import Input from "../../MbsComponent/Input";
import Select from "../../DefaultComponent/Select";
import SelectTable from "../../DefaultComponent/SelectTable";
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    Input,
    Select,
    SelectTable,
    UpdateProfile,
    UserProfile
  },
  /*-------------------------Set Component---------------------------------------*/
  props: {},
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
      form: {},
      data: {},
      updated: false,
      imgx: true,
      isUpdate: false,
      message: {
        txt: "",
        show: false
      }
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
    userData: get("Login,userData"),
    _mbs: get("setting/setValue"),
    getToken: get("Login/userToken"),
    branch: get("Branch/branch"),
    getNameBranch: get("Branch/getName")
  },
  /*-------------------------Methods------------------------------------------*/
  methods: {
    //** modal **/
    onUpdateModal(value) {
      this.$modal.show("user-modal");
      this.form = value;
      this.updated = true;
      this.isUpdate = true;
    },
    //Close Modal and reload data
    offModal() {
      this.$modal.hide("user-modal");
      this.isUpdate = false;
    },
    getMessage(txt, show) {
      this.message.show = show;
      this.message.txt = txt;
      console.log(txt);
    },
    submit() {
      console.log(this.form.password.length);
      this.checkMessage();
      if (this.form.permission == "") {
        this.message.show = true;
        this.getMessage("Please Choose User Permission", true);
      } else if (this.form.branch_id == "") {
        this.message.show = true;
        this.getMessage("Please Choose Branch Name", true);
      } else if (Number(this.form.password.length) < 6) {
        this.message.show = true;
        this.getMessage("Password must have more 6 character!", true);
      } else if (
        this.form.password != this.conf_password &&
        this.form.password != null &&
        this.conf_password != null
      ) {
        this.message.show = true;
        this.getMessage("Password is not match!", true);
      } else {
        this.getMessage("", false);
        if (!this.update) {
          this.$emit("store", this.form);
        } else {
          this.$emit("update", this.form);
        }
      }
    },
    /** data  */
    getId(id) {
      let user = JSON.parse(JSON.stringify(id));
      try {
        let id = user.user.id;
        return id;
      } catch (e) {}
    },
    getUser(name) {
      let user = JSON.parse(JSON.stringify(name));
      try {
        let fullname = user.user.fullname;
        return fullname;
      } catch (e) {}
    },
    getImge(img) {
      let user = JSON.parse(JSON.stringify(img));
      try {
        let img_user = user.user.img_user;
        return img_user;
      } catch (e) {}
    },
    defaultTableData: async function() {
      let params = {
        url: this.url
      };
      this.data = await this.$store.dispatch("default/getData", params);
      console.log(this.data);
    },
    /******* Methods default run ******/
    load: async function() {
      let params = {
        url: "user/all"
      };
      this.data = await this.$store.dispatch("default/getData", params);

      console.log(this.data);
      this.imgx = true;
    }
  }
};
</script>