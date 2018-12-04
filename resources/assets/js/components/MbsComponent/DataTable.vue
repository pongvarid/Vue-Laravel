<!----------Make By YourName---------------->
 <template>
<div>
  
 
<div class="table-responsive">
<table class="table">
     <thead >
     <tr>
      <th v-for="head in inData.data" @click="changeSort(head.value,head.process)" scope="col">{{head.name}}</th> 
    </tr>
  </thead>
              <tbody>
              
 
            </tbody>
</table>   
</div>

 <div class="container">
            <div class='row'>
                <div class='col-sm-8 col-12'>
                    <pagination :data="datas" @pagination-change-page="changePage"></pagination>

                </div>
                <div class='col-sm-4 col-12'>
                    <select class="form-control" @change="changePage()" v-model="num">
                        <option value="1">1</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
</template>

    <script>
import _ from "lodash";
import axios from "axios"
export default {
  name: "Root",
  /*-------------------------Load Component---------------------------------------*/
  components: {},
  /*-------------------------Set Component---------------------------------------*/
  props: {
    inData: {}
  },
  /*-------------------------DataVarible---------------------------------------*/
  data() {
    return {
      datas: Object,
      sort: {
        key: null,
        sort: null
      },
      search: null,
      where: "name",
      num: "10"
    };
  },
  watch: {
    inData(value) {
      this.datas = value;
    }
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
    changeSort(type, check) {
      if (check) {
        this.sort.key = type;
        if (this.sort.sort == null) {
          this.sort.sort = "desc";
        } else if (this.sort.sort == "desc") {
          this.sort.sort = "asc";
        } else if (this.sort.sort == "asc") {
          this.sort.sort = "desc";
        }
      }

      this.changePage();
    },
    changePage: async function(page = 1) {
      let search = "";
      let sort = "";
      let sortType = "";
      if (this.search != null && this.search != "") {
        search = "&search=" + this.search;
      }

      if (this.sort.key != null) {
        sort = "&sort=" + this.sort.key;
        sortType = "&sortType=" + this.sort.sort;
      }

      let where = "";
      where = "&where=" + this.where;

      let num = "";
      num = "&num=" + this.num;

       axios
        .get(
          "/api/"+this.inData.url+'?'+
            page +
            sort +
            sortType +
            search +
            where +
            num
        )
        .then(response => {
          this.datas = response.data;
        });
    },
    defaultData: async function() {
       
      let x = {
        url: this.inData.url
      };
      this.datas = await this.$store.dispatch("default/getData", x);
      console.log(this.datas);
    },

    /******* Methods default run ******/
    load() {
        this.defaultData();
    }
  }
};
</script>