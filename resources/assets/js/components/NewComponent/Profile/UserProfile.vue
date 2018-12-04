<!----------Make By YourName---------------->
<template>
  <div>
    <ul v-for="datas,index in data" v-if="datas.id == getId(userData)">
      <div class="card shadow-bl">
        <div class="card-header wh ldeep fs18">Detail
          <b-button class="btn round lsea change-right" @click="onModal()">
            <span class="mdi mdi-grease-pencil"></span>&nbsp;Update Your Profile
          </b-button>
        </div>
        <div class="row">
          <div class="col-md-5 col-12 mrt-30">
            <center>
              <img style="width:50%!important; height:auto;" :src="convertImg(datas.img_user)" alt>
            </center>
          </div>
          <div class="col-md-5 col-12 mrt-30">
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
            <br>
          </div>
        </div>
      </div>
    </ul>
    <!-- Debug -->
    <modal name="debug-profile" height="auto" adaptive draggable :clickToClose="false">
      <div class="modal-header ldeep wh">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Profile</h5>
        <button type="button" class="close" @click="offModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container pd-10">
        <center>
          <h1>Developing</h1>
        </center>
      </div>
    </modal>
    <!-------------------------------------------------Modal------------------------------------------------------------>
    <modal name="user-profile" height="auto" adaptive draggable :clickToClose="false">
      <div class="modal-header ldeep wh">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Profile</h5>
        <button type="button" class="close" @click="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container pd-10">
        <div class="container row">
          <div class="col-sm-6 col-12">
            <h2 class="lsea round pd-10 mrt-20 wh fs20 hg40 wd-full">User Image</h2>
            <div class="pd-10">
              <image-uploader
                v-if="!readonly"
                :preview="false"
                :maxWidth="512"
                :quality="0.7"
                v-model="form.img_user"
              ></image-uploader>
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
                <!-----     {{show.branch_id}}   ---->
                <SelectTable
                  :readonly="true"
                  table="branch"
                  v-model="form.branch_id"
                  :def="form.branch_id"
                  cover="Branch"
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
                <button type="submit" class="btn btn-primary">Save changes</button>
              </b-form>
            </div>
          </div>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
import Input from "../../MbsComponent/Input";
import Area from "../../MbsComponent/Textarea";
import Timezone from "../../MbsComponent/timezone";
import SelectTable from "../../DefaultComponent/SelectTable";
import { ImageUploader } from "vue-image-upload-resize";
import { get } from "vuex-pathify";

export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    Input,
    Area,
    Timezone,
    ImageUploader,
    SelectTable
  },
  /*-------------------------Set Component---------------------------------------*/
  props: {
    readonly: false
  },
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
      form: {},
      data: {},
      updated: false,
      message: {
        txt: "",
        show: false
      },
      conf_password: null
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
    convertImg(path) {
      if (this.form.img_user) {
        this.data.img_user = this.form.img_user;
        return this.form.img_user;
      } else {
        return path;
      }
    },

    //Open Modal method for set data when update
    onUpdateModal(params) {
      this.$modal.show("user-profile");
      this.form = params;
      this.updated = true;
    },
    //Open Modal method for add data
    onModal() {
      this.$modal.show("debug-profile");
    },
    //Close Modal and reload data
    offModal() {
      this.$modal.hide("debug-profile");
      this.updated = false;
    },

    closeModal: async function() {
      this.$modal.hide("user-profile");
      this.updated = false;
      this.form.img_user = null;
      this.convertImg("./images/logo.png");

      this.load();
    },

    //getdefault form
    defaultForm() {
      this.form = {};
    },

    //Update data to vuex --put
    updateData: async function(value) {
      console.log(value);
      let storeParams = {
        name: "User",
        url: "setting/user/" + value.id,
        form: value
      };
      this.data = await this.$store.dispatch("default/updateData", storeParams);
      this.onChange();
      this.offModal();
      this.defaultForm();
    },

    /******* Methods default run ******/
    load: async function() {
      let params = {
        url: "user/all"
      };
      this.data = await this.$store.dispatch("default/getData", params);

      console.log(this.data);
      this.imgx = true;
    },
    /** data */
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
    /** submit data */
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
    getMessage(txt, show) {
      this.message.show = show;
      this.message.txt = txt;
      console.log(txt);
    },
    checkMessage() {
      console.log(this.message.show);
      if (this.message.show == true) {
        this.message.show = false;
      }
    }
  }
};
</script>