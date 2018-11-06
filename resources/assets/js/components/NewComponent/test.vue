<template>
        <div>
            <h3>คันหู</h3>
            <h2>{{x}}</h2>

            <select class="selectpicker" v-model="ccv"   @change="onChange()">
            <option  value="1">ช็อกกะหรี่</option>
             <option  >เด็กขายน้ำ</option>
              <option  >ผู้ชายขายตัว</option>
                  <option  >ผู้ชายหน้าโง่ที่ไปฟิสเนสเพื่อเจอสาว</option>
                    <option  >ผู้หญิงบ้าบ้านจนอดไปคอนเสริทผัว</option>
                          <option >ผู้ชายกล้ามใหญ่หักแขน</option>
        </select>


        </div>
</template>

<script>
export default {
    
    name:'Hee'
    ,props:{
        x:'',
        ccv:'',
    },
    methods:{
        onChange(){
            this.$emit('input', this.ccv);
        }
    }

}
</script>

    
 