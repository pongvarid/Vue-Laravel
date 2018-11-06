<template>
    <div class="container"><br><br><br>
        <h2>Data Table</h2>
        <p v-if="sort.key!=null">Sort Data By : {{sort}}</p>

        <div class="input-group mb-3">
             <input type="text" class="form-control" v-model="search">
              <div class="input-group-append">
               <button :class="'btn round ' + _mbs('navbar')" @click="changePage()">Search</button>
     
            </div>
            </div>

      
      
        <table class="table">
            <thead :class="_mbs('navbar')">
                <tr>
                    <th @click="changeSort('name')" scope="col">name</th> 
                        <th @click="changeSort('value')" scope="col">discription</th>
                        <th @click="changeSort('description')" scope="col">discription</th>
                            <th @click="changeSort('other')" scope="col">other</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody v-for="data,index in cc.data">
                <tr>
                    <td>{{data.name}}</td> 
                      <td>{{data.value}}</td>
                    <td>{{data.description}}</td>
                    <td>{{data.other}}</td>
                    <td><a href="" class="btn round lpop bl">edit</a> 
                    <a href="" class="btn round lnot bl">delete</a></td>
                </tr>

            </tbody>
        </table>
        <pagination :data="cc" @pagination-change-page="changePage"></pagination>

    </div>
</template>

<script>
    
    import {
        get
    } from "vuex-pathify"
    import axios from "axios"
    export default {
        name: 'test',

        data() {
            return {
                cc: {},
                sort: {
                    key: null,
                    sort: null
                },search:null

            }
        },
        mounted() {

            this.load();

        },
        computed: {
            dataHg: get("table/test"),
                  _mbs: get("setting/setValue"), 
        },
        methods: { 

            load: async function () {

                    await this.$store.dispatch("table/getData")
                    this.cc = this.dataHg

                },
                changePage: async function (page = 1) {
                    let search='';
                    let sort ='';
                    let sortType ='';
                    if(this.search !=null && this.search !=''){
                        search = '&search='+this.search;
                    }
             
                    if(this.sort.key != null ){
                         sort ='&sort='+this.sort.key;
                     sortType ='&sortType='+this.sort.sort;
                    }
                    //alert('/api/test/?page=' + page+sort+sortType+search)
                    //alert('/api/test/?page=' + page+'&sort='+this.sort.key+'&sortType='+this.sort.sort);
                    //alert('/api/test/?page=' + page+sort+sortType+search);
                        axios.get('/api/mbs/table/test?page=' + page+sort+sortType+search)
                            .then(response => {
                                this.cc = response.data;
                            });
                    },
                    changeSort(type) { 
                        if (type == 'name') {
                            this.sort.key = type;
                            if (this.sort.sort == null) {
                                this.sort.sort = 'desc';
                            } else if (this.sort.sort == 'desc') {
                                this.sort.sort = 'asc'
                            } else if (this.sort.sort == 'asc') {
                                this.sort.sort = 'desc'
                            } 
                        }else{
                            if (type == 'value') {
                            this.sort.key = type;
                            if (this.sort.sort == null) {
                                this.sort.sort = 'desc';
                            } else if (this.sort.sort == 'desc') {
                                this.sort.sort = 'asc'
                            } else if (this.sort.sort == 'asc') {
                                this.sort.sort = 'desc'
                            } 
                        }
                        }

                        this.changePage();

                    }



        }
    }
</script>