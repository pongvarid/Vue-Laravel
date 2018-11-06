@extends('mbs/admin')
@section('vue')
  <div id="mbs_app" class="mrt-60">
    <v-app>
      <v-content>
        <v-container>
         <h2>  <v-btn   fab  class="box-green wh" @click="open()"><v-icon>add</v-icon></v-btn>Varible Manament</h2>  
        <v-data-table
    :headers="headers"
    :items="setting"
 
  >
    <template slot="items" slot-scope="props">
      <td>@{{ props.item.name }}</td>
      <td class="text-xs">@{{ props.item.value }}</td>
      <td class="text-xs">@{{ props.item.other }}</td> 
      <td class="text-xs">@{{ props.item.description }}</td> 
      <td class="text-xs">@{{ props.item.permission }}</td> 
      <td class="text-xs"><v-btn class="box-yellow" fab small @click="upadtes(props.item)"><v-icon>create</v-icon></v-btn>
      <v-btn fab small  color="red" dark v-if="props.item.permission != '0'" @click="deleteData(props.item.id)"><v-icon>delete_sweep</v-icon></v-btn></td> 
    </template>
  </v-data-table>

  <v-dialog v-model="add" persistent>
    <v-card>
       <v-card-title color="primary" primary-title>
          <h2>Data Management</h2>
       </v-card-title>
       <v-container> 
        <v-text-field  v-model="form.name" label="Variable Name"></v-text-field>
        <v-text-field  v-model="form.value" label="Value"></v-text-field>
        <v-text-field  v-model="form.other" label="Other"></v-text-field>
        <v-text-field  v-model="form.description" label="Description"></v-text-field>
       </v-container>
       <v-btn v-if="!updated" @click="insert()"><v-icon>pencil</v-icon></v-btn>
       <v-btn v-if="updated" @click="update()">Update</v-btn>
       <v-btn @click="cancle()">Cancle</v-btn>
    </v-card>
  </v-dialog>

     
    </v-app>
  </div>
 


 @endsection
  @section('script')

  <script>
    new Vue({ el: '#mbs_app',
    
      data:{
        headers: [ 
          { text: 'Name', value: 'name' }, 
          { text: 'Description', value: 'description' },
          { text: 'Value', value: 'value' },
          { text: 'Other', value: 'other' },
          { text: 'Permission', value: 'permission' },
          { text: 'Action', value: 'action' }
        ],
        setting:{},
          form:{},
            add:false,
            updated:false,
      },
      methods:{
        insert:async function(){
          this.form.permission = 1;
          let load = axios.post('/api/mbs/setting',this.form)
                  .then((r) => { alert('สำเร็จ')}).catch((e) => { alert('ล้มเหลว')});
         
        this.cancle();
             
        },
        update:async function(){
          let load = axios.put('/api/mbs/setting/'+this.form.id,this.form)
                  .then((r) => { alert('สำเร็จ')}).catch((e) => { alert('ล้มเหลว')});
         
        this.cancle();
        },
        open(){
          this.add =true;
        },
        upadtes(data){
          this.add =true;
          this.form = data;
          this.updated = true;
        },
        cancle(){
          this.form ={};
            this.load();
            this.updated = false;
            this.add =false;
        },
        deleteData:async function(id){
          let con = confirm('คุณแน่ใจใช่ไหมที่จะลบข้อมูล');
          if(con){
          let load = axios.delete('/api/mbs/setting/'+id)
                  .then((r) => { alert('สำเร็จ')}).catch((e) => { alert('ล้มเหลว')});
          }
        this.cancle();
        },
        load:async function(){
          let load = axios.get('/api/mbs/setting')
          .then((r) => {
                this.setting =  r.data
            }).catch((e) => {
                
            });
        },   
      },
      async mounted(){
        this.load();
      }
    
    });
  </script>
 @endsection