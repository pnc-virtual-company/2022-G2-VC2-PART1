<template>
  <section>
    <div class="modal fade modal-dialog modal-lg obsolute" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="bg-info p-2 d-flex">
                <h3 class="modal-title text-light text-center" id="exampleModalLabel" v-if="showReset">Reset password</h3>
                <h3 class="modal-title text-light text-center" id="exampleModalLabel" v-else>Detail Information</h3>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="body">
                <div class="form-reset_password" v-if="showReset">
                      <div class="reset-pass">
                          <input class="password" type="password" v-model="newPws" placeholder="Create New Password">
                          <input class="password" type="password" v-model="newConPws" placeholder="Confirm Password">
                          <div class="lida">{{lidation}}</div>
                          <br>
                          <button class="save" @click="getNewPws()">Save Change</button>
                      </div>
                </div>
                
                <div class="modal-body d-flex w-100" v-for="profile of students" :key="profile" v-else>
                    <div class="photo">
                      <header>
                        <div class="profile">
                          <img :src="profile.image" alt="">
                          <div class="bg-profile"></div>
                          <label for="file"><i class="fas fa-camera fa-2x"></i></label>
                          <input type="file" id="file" name="image"  hidden @change="addStudentProfile">
                        </div>
                      </header>
                      <div class="reset-pws">
                        <button class="btn-reset" @click="isReset()">
                            Reset Password
                        </button>
                      </div>

                     
                    </div>

                    <div class="info d-flex p-2">
                      <div class="left-side">
                        <p>First Name</p>
                        <p>Last Name</p>
                        <p>Sex</p>
                        <p>Email</p>
                        <p>Phone</p>
                        <p>Location</p>
                        <p>Generation</p>
                      </div>

                      <div class="center-side">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                      </div>

                      <div class="right-side">
                        <p>{{profile.last_name}}</p>
                        <p>{{profile.first_name}}</p>
                        <p>{{profile.gender}}</p>
                        <p>{{profile.email}}</p>
                        <p>{{profile.phone}}</p>
                        <p>PNC</p>
                        <p>{{profile.batch}}</p>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
  </section>
</template>
<script>
import axiosClient from "../../axios-http";
export default {
  data() {
    return{
      studentProfile: "",
      studentId:null,
      students:[],
      showReset:false,
      newPws:"",
      newConPws:"",
      lidation:""


    }
  },
  methods:{
     getStudents(){
      this.studentId = localStorage.getItem('user_id');
      axiosClient.get("students/student/"+this.studentId).then((reponse) => {
        this.students = reponse.data;
        console.log(this.students);
      });
    },
    async addStudentProfile(event) {
      this.studentProfile = event.target.files[0];
      console.log(this.studentProfile);
      const body = new FormData();
      body.append('image',this.studentProfile)
      body.append('_method', 'PUT')
      axiosClient.post("students/student_profile/"+this.studentId,body).then((reponse) => {
        console.log(reponse.data);
        this.getStudents();
      });

    },
    isReset(){
      this.showReset=true;
    },
    getNewPws(){
      
      if(this.newPws=="" && this.newConPws==""){
        this.lidation="Please input new password!"
      }else{
        if(this.newPws===this.newConPws){
          let body={}
          body['password']=this.newPws
          axiosClient.put("students/reset_newpassword/"+this.studentId,body).then((response)=>{
              console.log(response.data);
              this.showReset=false;
          })
        }else{
          this.lidation="Your password and password confirm is not valid!"
        }
    

      }

    }
  },
  mounted() {
    this.getStudents()
  }

}
</script>

<style scoped>

    .obsolute {
      position: fixed;
      bottom: 0;
      right: 0;
    }
    .logo {
      color: #F2AE00;
      text-shadow: 2px 2px #0f0f0f;
    }

    .upload img {
      width: 50px;
      height: 50px;
    }

    .reset-pass {
      margin-bottom: 10px;
    }

    .save {
      padding: 10px;
      background-color: #F2AE00;
      border-radius: 5px;
      display: block;
      margin-left: auto;
      border: 1px solid black;
      margin-top: 8px;
      border: none;
    }

    .image {
      color: white;
      display: block;
      margin-left: auto;
    }

    .profile img{
      display: block;  
      margin: -15px auto;  
   
      width: 165px;
      height: 170px;
  
    }
    
    .profile i{
      text-decoration: none;
      position: absolute;
      font-size: 1.3rem;
      margin:-1.5rem 7.5rem;
      color: rgb(140, 218, 234);
     
    }
    .bg-profile{
      width: 165px;
      height: 30px;
      position: absolute;
      margin: -1rem 3.1rem;
      background: rgba(83, 86, 87, 0.528);
    }

    .password {
      border-radius: 5px;
      padding: 5px;
      margin: 3px 0 3px 0;
      border: 1px solid black;
      width: 100%;
    }

    .photo {
      width: 40%;
      background-color: #fff;
      border-radius:5px;
      padding-top: 2rem ;
      margin-right: 15px;
      line-height: 15px;
    }
    .info {
      line-height: 15px;
      border-radius:5px;
      width: 70%;
      background-color: #fff;
      display: flex;
      align-items: center;
    }


    .body {
      width: 100%;
      padding: 10px;
      background-color: rgb(174, 215, 238);
    }

    span {
      color: #ffffff;
      font-weight: bold;
      font-size: 1.3rem;
    }
    h3 {
      margin: auto;
    }

    .left-side {
      width: 20%;
      font-weight: bold;
    }

    .center-side {
      width: 3%;
    }

    .right-side {
      width: 65%;
    }

    .left-des {
      width: 40%;
      margin: auto;
      font-weight: bold;
    }

    .center-des {
      width: 5%;
    }
    
    .right-des {
      width: 40%;
    }


    .reset-pws{
      width: 100%;
      display: flex;
      justify-content: center;
    }
    .btn-reset{
      background: rgb(213, 173, 15);
      outline:none;
      border:none;
      margin-top: 7px;
      padding:5px 10px;
    }
    .lida{
      color: rgb(235, 60, 60);
    }

   
</style>