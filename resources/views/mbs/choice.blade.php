@extends('mbs/admin')
@section('vue')
  <div id="mbs_app" class="mrt-60">
    <v-app>
      <v-content>
      
        <v-container>
         <h2>  <v-btn   fab  class="box-green wh" @click="open(setting.length)"><v-icon>add</v-icon></v-btn>Choice Manament</h2>  
      
         <v-data-table
    :headers="headers"
    :items="setting"
 
  >
    <template slot="items" slot-scope="props">
      <td>@{{ props.item.name }}</td>
      <td class="text-xs">@{{ props.item.type }}</td> 
      <td class="text-xs">
      <v-btn class="box-blueFX" fab small @click="upadtes(props.item)"><v-icon>send</v-icon></v-btn>  
      <v-btn class="box-yellow" fab small @click="upadtes(props.item)"><v-icon>create</v-icon></v-btn>
      <v-btn fab small  color="red" dark v-if="props.item.permission != '0'" @click="deleteData(props.item.id)"><v-icon>delete_sweep</v-icon></v-btn></td> 
    </template>
  </v-data-table>

  <v-dialog v-model="add" persistent>
    <v-card>
       <v-card-title color="primary" primary-title>
          <h2>Choice Management</h2>
       </v-card-title>
       <v-container> 
        <v-text-field  v-model="form.name" label="Variable Name"></v-text-field>
        <v-text-field readonly v-model="form.type" label="Type this choice (Make by system)"></v-text-field>
       </v-container>
      
       <v-btn v-if="!updated" @click="insert()">Save</v-btn>
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
          { text: 'Type', value: 'type' },
          { text: 'Action'  }
        ],
        setting:{},
          form:{},
            add:false,
            updated:false,
      },
      methods:{
        getType(x){
           if(x > 10){
             return Number(x+1)
           }else{
             
             return '0'+Number(x+1)
           }
        },
        insert:async function(){
            
          let load = axios.post('/api/mbs/choice',this.form)
                  .then((r) => { alert('สำเร็จ')}).catch((e) => { alert('ล้มเหลว')});
         
        this.cancle();
             
        },
        update:async function(){
          let load = axios.put('/api/mbs/choice/'+this.form.id,this.form)
                  .then((r) => { alert('สำเร็จ')}).catch((e) => { alert('ล้มเหลว')});
         
        this.cancle();
        },
        open(setting){
         
          this.form.type = this.getType(setting)
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
          let load = axios.delete('/api/mbs/choice/'+id)
                  .then((r) => { alert('สำเร็จ')}).catch((e) => { alert('ล้มเหลว')});
          }
        this.cancle();
        },
        load:async function(){
         
          let load = axios.get('/api/mbs/choice')
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