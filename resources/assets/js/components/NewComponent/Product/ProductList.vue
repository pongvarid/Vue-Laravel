<template>
    <div class="container">
        <p  style="display:none;" v-if="sort.key!=null">Sort Data By : {{sort}}</p>


        <div class="input-group">
            <input @change="changePage()" type="text" placeholder="Search " class="form-control" v-model="search">
            <div class="input-group-append">

                <select class="form-control" v-model="where">
                    <option value="product_name">Product Name</option>
                    <option value="product_code">Product Code</option>
                    <option value="product_type">Product Type</option>
                </select>
                <button class="btn lsea wh" @click="changePage()">Search</button>
            </div>
        </div>

        <br>
        <div class="table-responsive"> 
        <table class="table ">
            <thead :class="_mbs('navbar')">
                <tr>
                    <th class="wh" @click="changeSort('product_name')" scope="col">Product Name <span v-if="sort.key=='product_name'&&sort.sort == 'asc'" class="mdi mdi-arrow-up"></span><span v-if="sort.key=='product_name'&&sort.sort == 'desc'" class="mdi mdi-arrow-down"></span></th>
                    <th class="wh" @click="changeSort('product_code')" scope="col">Product Code <span v-if="sort.key=='product_code'&&sort.sort == 'asc'" class="mdi mdi-arrow-up"></span><span v-if="sort.key=='product_code'&&sort.sort == 'desc'" class="mdi mdi-arrow-down"></span></th>
                    <th class="wh" @click="changeSort('product_type')" scope="col">Product Type <span v-if="sort.key=='product_type'&&sort.sort == 'asc'" class="mdi mdi-arrow-up"></span><span v-if="sort.key=='product_type'&&sort.sort == 'desc'" class="mdi mdi-arrow-down"></span></th>
                    <th class="wh" @click="changeSort('product_description')" scope="col">Product Description <span v-if="sort.key=='product_description'&&sort.sort == 'asc'" class="mdi mdi-arrow-up"></span><span v-if="sort.key=='product_description'&&sort.sort == 'desc'" class="mdi mdi-arrow-down"></span></th>
                    <th class="wh" scope="col">action</th>
                </tr>
            </thead>
            <tbody v-for="data,index in cc.data">
                <tr v-if="data.status_id != '3'">
                    <td>{{data.product_name}}</td>
                    <td>{{data.product_code}}</td>
                    <td>{{data.product_type}}</td>
                    <td ><button class="btn round lpop" @click="opDes(data.product_description)">Show Description</button></td>
                    <td>
                        <a @click="$emit('view',data)" class="btn round lok wh"><span class="mdi mdi-eye"></span></a>
                        <a @click="$emit('change',data)" class="btn round lpop wh"><span class="mdi mdi-pencil"></span></a>
                        <a @click="$emit('destroy',data)" class="btn round lnot wh"><span class="mdi mdi-delete"></span></a></td>
                </tr>

            </tbody>
        </table>
        </div>
        <div class="container">
            <div class='row'>
                <div class='col-sm-8 col-12'>
                    <pagination :data="cc" @pagination-change-page="changePage"></pagination>

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


 <vs-popup class="holamundo"  title="Description" style="index-z:1;" :active.sync="popupActivo">
      <p>
       {{des}}
      </p>
    </vs-popup>


    </div>
</template>

<script>
import { get } from "vuex-pathify";
import axios from "axios";
export default {
  name: "test",
  props: {
    dataIn: {}
  },
  data() {
    return {
      popupActivo:false,
      des:'',
      cc: {},
      sort: {
        key: null,
        sort: null
      },
      search: null,
      where: "product_name",
      num: "10"
    };
  },
  watch: {
    dataIn(value) {
      this.cc = value;
    }
  },
  mounted() {
    this.load();
  },
  computed: {
    dataHg: get("table/test"),
    _mbs: get("setting/setValue")
  },
  methods: {
    opDes(des){
      this.popupActivo =true;
      this.des = des;
    },
    hello(params) {
      this.$emit("hello", { val: "hel" });
    },
    load: async function() {
      if (this.dataIn) {
        this.cc = this.dataIn;
      } else {
        axios.get("/api/mbs/table/multi/product").then(response => {
          this.cc = response.data;
        });
      }
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

      //alert('/api/test/?page=' + page+sort+sortType+search)
      //alert('/api/test/?page=' + page+'&sort='+this.sort.key+'&sortType='+this.sort.sort);
      //alert('/api/test/?page=' + page+sort+sortType+search);
      axios
        .get(
          "/api/mbs/table/multi/product?page=" +
            page +
            sort +
            sortType +
            search +
            where +
            num
        )
        .then(response => {
          this.cc = response.data;
        });
    },
    changeSort(type) {
      this.sort.key = type;
      if (this.sort.sort == null) {
        this.sort.sort = "desc";
      } else if (this.sort.sort == "desc") {
        this.sort.sort = "asc";
      } else if (this.sort.sort == "asc") {
        this.sort.sort = "desc";
      }

      this.changePage();
    }
  }
};
</script>