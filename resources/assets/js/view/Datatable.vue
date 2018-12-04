<template>
    <div class="container"><br>
        <h2>Data Table</h2>
        <p v-if="sort.key!=null">Sort Data By : {{sort}}</p>


<div class="input-group">
       <input type="text" placeholder="Search " class="form-control" v-model="search"> 
  <div class="input-group-append">
  
                    <select class="form-control" v-model="where">
                        <option value="name">Branch Name</option>
                        <option value="phone">Phone</option>
                        <option value="country">Country</option>
                    </select>
                      <button class="btn ldeep wh" @click="changePage()">Search</button>
  </div>
</div>



<br><br>
        <table class="table">
            <thead :class="_mbs('navbar')">
                <tr>
                    <th @click="changeSort('name')" scope="col">Branch Name</th>
                    <th @click="changeSort('value')" scope="col">Phone</th>
                    <th @click="changeSort('description')" scope="col">Country</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody v-for="data,index in cc.data">
                <tr>
                    <td>{{data.name}}</td>
                    <td>{{data.phone}}</td>
                    <td>{{data.mailing_country}}</td>
                    <td><a href="" class="btn round lpop bl">edit</a>
                        <a href="" class="btn round lnot bl">delete</a></td>
                </tr>

            </tbody>
        </table>

        <div class="container">
            <div class='row'>
                <div class='col-sm-10 col-12'>
                    <pagination :data="cc" @pagination-change-page="changePage"></pagination>

                </div>
                <div class='col-sm-2 col-12'>
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
                },
                search: null,
                where: 'name',
                num: '10',

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
                axios.get('/api/mbs/table/multi/branch')
                    .then(response => {
                        this.cc = response.data;
                    });
            },
            changePage: async function (page = 1) {
                let search = '';
                let sort = '';
                let sortType = '';
                if (this.search != null && this.search != '') {
                    search = '&search=' + this.search;
                }

                if (this.sort.key != null) {
                    sort = '&sort=' + this.sort.key;
                    sortType = '&sortType=' + this.sort.sort;
                }

                let where = '';
                where = '&where=' + this.where;


                let num = '';
                num = '&num=' + this.num;
 
                axios.get('/api/mbs/table/multi/branch?page=' + page + sort + sortType + search + where + num)
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
                } else {
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