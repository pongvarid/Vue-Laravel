<!----------Make By YourName---------------->
<template>
    <div class="container"> 
        <div class="input-group">

            <input @change="changePage()" type="text" placeholder="Search " class="form-control" v-model="search">
            <div class="input-group-append">

                <select class="form-control" v-model="where">
                    <option value="name">Account Name</option>
                    <option value="phone">Phone</option>
                    <option value="fullname">Account Owner</option>
                </select>

                <button class="btn lsea wh" @click="changePage()">Search</button>


            </div>
        </div> 
        <br>
        <div class="table-responsive">
            <table class="table ">
                <thead class="lblue">
                    <tr>
                        <th class="wh pointer" @click="changeSort('name')" scope="col">Account Name <span :class="arrow('name')"></span></th>
                        <th class="wh pointer" @click="changeSort('phone')" scope="col">Phone <span :class="arrow('phone')"></span></th>
                        <th class="wh pointer" @click="changeSort('fullname')" scope="col">Account Name <span :class="arrow('fullname')"></span></th>
                        <th class="wh" scope="col">action</th>
                    </tr>
                </thead>
                <tbody v-for="datas,index in data.data">
                    <tr v-if="datas.status_id != '3'">
                        <td>{{datas.name}}</td>
                        <td>{{datas.phone}}</td>
                        <td>{{datas.fullname}}</td>
                        <td>
                            <a @click="$emit('view',datas)" class="btn round lok wh"><span class="mdi mdi-eye"></span></a>
                            <a @click="$emit('change',datas)" class="btn round lpop wh"><span class="mdi mdi-pencil"></span></a>
                            <a @click="$emit('destroy',datas)" class="btn round lnot wh"><span class="mdi mdi-delete"></span></a></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="container">
            <div class='row'>
                <div class='col-sm-8 col-12'>
                    <pagination :limit="5" :data="data" @pagination-change-page="changePage"></pagination> 
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
    import axios from "axios";
    import {
        get
    } from "vuex-pathify";
    export default {
        name: "Root",
        /*-------------------------Load Component---------------------------------------*/
        components: {
           
        },
        watch: {
            change(value) {
               this.load(); 
            }
        },
        /*-------------------------Set Component---------------------------------------*/
        props: {
            change: '',
        },
        /*-------------------------DataVarible---------------------------------------*/
        data() {
            return {
                url: 'mbs/join/account',
                tableJoin : 'users',
                colParent : 'account.users_id',
                colJoin:'users.id',
                data: {},
                sort: {
                    key: null,
                    sort: null
                },
                search: null,
                where: "name",
                num: "10"

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
             branch:get('Branch/branch'),
             getNameBranch:get('Branch/getName'),
        },
        /*-------------------------Methods------------------------------------------*/
        methods: {
            loadData() {

            },
            defaultTableData: async function () {
                let params = {
                    url: this.url
                }
                this.data = await this.$store.dispatch('default/getData', params);
                console.log(this.data);
            },
            changeTableData: async function (url) {
                let params = {
                    url: url
                }
                this.data = await this.$store.dispatch('default/getData', params);
                console.log(this.data);
            },
            changePage: async function (page = 1) {
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
                let url = this.url + "&page=" + page +
                    sort +
                    sortType +
                    search +
                    where +
                    num;
                this.changeTableData(url);
            },
            arrow(key) {
                if (this.sort.key == key) {
                    if (this.sort.sort == 'asc') {
                        return 'mdi mdi-arrow-up';
                    } else {
                        return 'mdi mdi-arrow-down';
                    }
                }

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
            },
            /******* Methods default run ******/
            load: async function () { 
                this.url = this.url+'?join='+this.tableJoin+'&tableA='+this.colParent+'&tableB='+this.colJoin
                this.defaultTableData(); 
                this.$store.dispatch('Branch/getData');
                //alert('Debug it!'); 
               
            },
            debug() {
                //alert('Debug it!');
            },
        }
    };
</script>