<template>
  <div class="stude-form">
    <div style="width: 750px; display: flex; margin: auto; text-align: center; justify-content: center; background: #009DB2; padding: 10px 10px; font-size: 25px; color: white; border-top-left-radius: 7px; border-top-right-radius: 7px;">Add Students</div>
    <form @submit.prevent="addStudent" class="Forms-students" action="" style=" width: 750px; align-items: center; margin: auto;">
        <input type="firstname" placeholder="Firstname" style="width:300px; height: 5vh; margin: 10px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;">
        <small class="text-danger" v-if="vilidFirst">Fill your firstname</small>
        <input type="lastname" placeholder="Lastname" style="width:300px; height: 5vh; margin: 10px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;"><br>
        <small class="text-danger" v-if="vilidLast">Fill your lastname</small>
        <select style="width: 300px; padding: 5px 5px;height: 5vh; margin: 10px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;">
            <option>Male</option>
            <option>Female</option>
        </select>
        <small class="text-danger" v-if="vilidSex">Fill your Sex</small>
        <input type="email" placeholder="Email" style="width: 300px; height: 5vh; margin: 10px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;"><br>
        <small class="text-danger" v-if="vilidEmail">Fill your email</small>
        <input type="phone" placeholder="Phone" style="width: 300px; height: 5vh; margin: 10px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;">
        <small class="text-danger" v-if="vilidPone">Fill your phone-number</small>
            <select style="width: 300px; padding: 5px 5px; height: 5vh; margin: 10px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;">
                <option>Batch</option>
                <option>Web 2022 A</option>
                <option>Web 2022 B</option>
                <option>Web 2023 A</option>
                <option>Web 2023 B</option>
                <option>Web 2022 C</option>
                <option>Web 2023 C</option>
            </select>
            <small class="text-danger" v-if="vilidBatch">Fill your batch</small>
            <button type="button" style="width: 250px; border: none; background: orange; padding: 8px 8px; font-size: 20px; color: white; margin: 10px 10px; border-radius: 5px;">Add</button>
    </form>
  </div>
</template>

<script>
export default {

    data(){
        return{
            firstname:'',
            lastname:'',
            sexs:'',
            emial:'',
            phone:'',
            batch:'',

            arrays:[],

            vilidFirst:false,
            vilidLast:false,
            vilidSex:false,
            vilidEmail:false,
            vilidPone:false,
            vilidBatch:false
        }
    },

    methods:{
        addStudent(){
           
        },
        validation(){
            if(this.vilidFirst.trim().length==0){
                this.vilidFirst =true;
            }else{
                this.vilidFirst =false;
            }

            if(this.vilidLast.trim().length==0){
                this.vilidLast =true;
            }else{
                this.vilidLast = false;
            }

            if(this.vilidSex.trim().length==0){
                this.vilidSex =true;
            }else{
                this.vilidSex = false;
            }

            if(this.vilidEmail.trim().length()==0){
                this.vilidEmail=true;
            }else{
                this.vilidEmail = false;
            }
            if(this.vilidPone.trim().length==0){
                this.vilidPone = true;

            }else{
                this.vilidPone = false;
            }
            if(this.vilidBatch.trim()==0){
                this.vilidBatch = true;
            }else{
                this.vilidBatch = false;
            }
        }
    }

}
</script>

<style scoped>


.Forms-students{
    background: rgb(250, 250, 250);
    padding: 35px 35px;
    border: solid 1px;
}

</style>