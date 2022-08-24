<template>
  <div class="stude-form">
    <div style="width: 750px; display: flex; margin: auto; text-align: center; justify-content: center; background: #009DB2; padding: 10px 10px; font-size: 25px; color: white; border-top-left-radius: 7px; border-top-right-radius: 7px;">Add Students</div>
    <form @submit.prevent="addStudent" class="Forms-students" action="" style=" width: 750px; align-items: center; margin: auto; ">
        <input v-model="firstname" type="firstname" placeholder="Firstname" style="width:300px; height: 5vh; margin: 15px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;">
        <small class="firstname" v-if="vilidFirst"> Please fill your firstname</small>
        <input v-model="lastname" type="lastname" placeholder="Lastname" style="width:300px; height: 5vh; margin: 15px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;"><br>
        <small class="lastname" v-if="vilidLast">Please fill your lastname</small>
        <select v-model="sexs" style="width: 300px; padding: 5px 5px; height: 5vh; margin: 20px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;"><br>
                <option value="">Sex</option>
                <option>Male</option>
                <option>Female</option>
            </select>
        <small class="vilidLeft" v-if="vilidSex">Please fill your Sex</small>
        <input v-model="email" type="email" placeholder="Email" style="width: 300px; height: 5vh; margin: 15px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;"><br>
        <small  class="vilidRight" v-if="vilidEmail">Pease fill your email</small>
        <input v-model="phone" type="phone" placeholder="Phone" style="width: 300px; height: 5vh; margin: 15px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;">
        <small class="numbers" v-if="vilidPone">Please fill your phone-number</small>
            <select v-model="batch" style="width: 300px; padding: 5px 5px; height: 5vh; margin: 15px 10px; background: #D9D9D9; border: solid 1px; border-radius: 5px;">
                <option value="">Batch</option>
                <option>Web 2022 A</option>
                <option>Web 2022 B</option>
                <option>Web 2023 A</option>
                <option>Web 2023 B</option>
                <option>Web 2022 C</option>
                <option>Web 2023 C</option>
            </select>
            <small class="vilidRight" v-if="vilidBatch">Please fill your batch</small>
            <button @click="validation" type="button" style="width: 250px; border: none; background: orange; padding: 8px 8px; font-size: 20px; color: white; margin: 25px; margin-left: 300px; border-radius: 5px;">Add</button>
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
            email:'',
            phone:'',
            batch:'',

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
            if(this.firstname.trim().length==0){
                this.vilidFirst =true;
            }else{
                this.vilidFirst =false;
            }
            if(this.lastname.trim().length==0){
                this.vilidLast =true;
            }else{
                this.vilidLast = false;
            }
            if(this.sexs.trim().length==0){
                this.vilidSex =true;
            }else{
                this.vilidSex = false;
            }

            if(this.email.trim().length==0){
                this.vilidEmail=true;
            }else{
                this.vilidEmail=false;
            }

            if(this.phone.trim().length==0){
                this.vilidPone=true;
            }else{
                this.vilidPone = false;
            }

            if(this.batch.trim().length==0){
                this.vilidBatch = true;

            }else{
                this.vilidBatch = false;
            }
        }
    }
}
</script>
<style scoped>
small {
  animation: mymove 5s infinite;
}
@keyframes mymove {
  50% {text-shadow: 5px 5px 30px red;}
}
small{
    display: flex;
    position: absolute;
}
.vilidRight{
    margin: -19px 450px;
    width: 200px;
    color: red;
}
.lastname{
    margin: -18px 440px;
    width: 200px;
    color: red;

}

.firstname{
    color: red;
    margin: -16px 110px;
}
.vilidLeft{
    color: red;
    margin: -21px 125px;
}
.numbers{
    color: red;
    margin: -17px 100px;
}

.Forms-students{
    background: rgb(250, 250, 250);
    padding: 35px 35px;
    border: solid 1px;
    border-bottom-right-radius: 7px;
    border-bottom-left-radius: 7px;
}

</style>