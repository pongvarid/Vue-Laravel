<!----------Make By YourName---------------->
<template>
  <div>
    <div class="card shadow-bl">
      <div class="card-header wh ldeep fs18">Company Data Management</div>
      <div class="container pd-20">
        <center>
          <img style="width:50%!important; height:auto;" :src="convertImg(data.img_company)" alt>
        </center>

        <center>
          <hr>
          <h2>{{data.name}}</h2>
          <hr>
        </center>
        <div class="mrl-20">
          <h4 class="fs18">
            <b>Company ID :</b>
            &nbsp; {{data.company_id}}
          </h4>
          <h4 class="fs18">
            <b>Business Type :</b>
            &nbsp; {{data.business_type}}
          </h4>
          <h4 class="fs18">
            <b>Establish :</b>
            &nbsp; {{data.establish}}
          </h4>
          <!---<h4 class="fs18"><b>Currency :</b>&nbsp; Dolla </h4> ---->
          <hr>
          <center>
            <button class="btn round lsea" @click="onUpdateModal(data)">
              <span class="mdi mdi-grease-pencil"></span>&nbsp;Update Your Company
            </button>
          </center>
        </div>
      </div>
    </div>

    <!-------------------------------------------------Modal------------------------------------------------------------>
    <modal name="company-modal" height="auto" adaptive draggable :clickToClose="false">
      <div class="modal-header ldeep wh">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Company</h5>
        <button type="button" class="close" @click="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container pd-10">
        <div class="container">
          <center>
            <img
              style="width:50%!important; height:auto;"
              class="full-width hg150"
              :src="form.img_company"
              alt
            >
          </center>
        </div>
        <image-uploader
          v-if="!readonly"
          :preview="false"
          :maxWidth="512"
          :quality="0.7"
          v-model="form.img_company"
        ></image-uploader>
        <br>
        <br>

        <Input label="Company Name" v-model="form.name" :def="form.name" cover="cover"/>
        <Input label="Company Id" cover="cover" v-model="form.company_id" :def="form.company_id"/>
        <Input
          label="Business Type"
          cover="cover"
          v-model="form.business_type"
          :def="form.business_type"
        />
        <Input
          label="Establish"
          :date="true"
          cover="cover"
          v-model="form.establish"
          :def="form.establish"
        />
        <hr>
        <center>
          <button class="btn round lsea" @click="updateData()">
            <span class="mdi mdi-grease-pencil"></span>&nbsp;Update Your Company
          </button>
        </center>
      </div>
    </modal>
  </div>
</template>

<script>
import Input from "../../../MbsComponent/Input";
import Area from "../../../MbsComponent/Textarea";
import Timezone from "../../../MbsComponent/timezone";
import { ImageUploader } from "vue-image-upload-resize";
import { get } from "vuex-pathify";

export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {
    Input,
    Area,
    Timezone,
    ImageUploader
  },
  /*-------------------------Set Component---------------------------------------*/
  props: {},
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
      form: {},
      data: {},
      updated: false,
      imgx: true
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
    convertImg(path) {
      if (this.form.img_company) {
        this.data.img_company = this.form.img_company;
        return this.form.img_company;
      } else {
        return path;
      }
    },

    //Open Modal method for set data when update
    onUpdateModal(params) {
      this.$modal.show("company-modal");
      this.form = params;
      this.updated = true;
    },
    //Open Modal method for add data
    onModal() {},
    //Close Modal and reload data
    offModal() {
      this.$modal.hide("company-modal");
      this.updated = false;
    },

    closeModal: async function() {
      this.$modal.hide("company-modal");
      this.updated = false;
      this.form.img_company = null;
      this.convertImg("./images/logo.png");

      this.load();
    },

    //getdefault form
    defaultForm() {},
    //Store data to vuex --post
    storeData: async function() {},

    clearImage() {
      if (this.form.img_company == "logo.png") {
        delete this.form.img_company;
      }
    },
    //Update data to vuex --put
    updateData: async function() {
      let params = {
        url: "setting/company/veritrans/" + this.form.id,
        form: this.form
      };
      this.data = await this.$store.dispatch("default/updateData", params);
      this.offModal();
      this.imgx = false;
      //   this.load();
      this.load();
    },
    //Delete data to vuex --delete
    destroyData: async function(params) {},

    /******* Methods default run ******/
    load: async function() {
      let params = {
        url: "setting/company/veritrans"
      };
      this.data = await this.$store.dispatch("default/getData", params);

      console.log(this.data);
      this.imgx = true;
    }
  }
};
</script>