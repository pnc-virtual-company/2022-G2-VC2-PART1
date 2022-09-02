<template>
  <section>
    <div class="modal fade modal-dialog modal-lg obsolute" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="bg-info p-2 d-flex">
                <h3 class="modal-title text-light text-center" id="exampleModalLabel">Detail Information</h3>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="body">
                
                <div class="modal-body d-flex w-100">
                    <div class="photo">
                      <header>
                        <div class="profile">
                          <img :src="students.image" alt="">
                          <div class="bg-profile"></div>
                          <label for="file"><i class="fas fa-camera fa-2x"></i></label>
                          <input type="file" id="file" name="image"  hidden @change="addStudentProfile">
                        </div>
                      </header>
                      <div class="reset-pws">
                        <button class="btn-reset">
                            Reset Password
                        </button>
                      </div>

                      <!-- <div class="reset-pass">
                          <input class="password" type="password" placeholder="Create New Password">
                          <input class="password" type="password" placeholder="Confirm Password">
                          <br>
                          <button class="save">Save Change</button>
                      </div> -->
                    </div>

                    <div class="info d-flex p-2">
                      <div class="left-side">
                        <p>First Name</p>
                        <p>Last Name</p>
                        <p>Sex</p>
                        <p>Date of birth</p>
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
                        <p>:</p>
                      </div>

                      <div class="right-side">
                        <p>Phorn</p>
                        <p>Phandy</p>
                        <p>Female</p>
                        <p>02/04/2002</p>
                        <p>phandy.phorn@gmail.com</p>
                        <p>0962517455</p>
                        <p>PNC</p>
                        <p>2022</p>
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
import axios from "../../axios-http";
export default {
  data() {
    return{
      studentProfile: "",
      studentId:1,
      students:[]

    }
  },
  methods:{
     getStudents(){
      axios.get("students/"+this.studentId).then((reponse) => {
        this.students = reponse.data;
        // localStorage.setItem('id',reponse.data[0].id)
        console.log(this.students);
      });
    },
   
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
      margin-right: auto;  
      margin-left: auto; 
      width: 175px;
      height: 180px;
  
    }
    
    .profile i{
      text-decoration: none;
      position: absolute;
      font-size: 1.3rem;
      margin:-2.4rem 7.5rem;
      color: rgb(140, 218, 234);
     
    }
    .bg-profile{
      width: 175px;
      height: 30px;
      position: absolute;
      margin: -1.9rem 2.9rem;
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
      width: 30%;
      font-weight: bold;
    }

    .center-side {
      width: 5%;
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
      padding:5px 10px;
    }

   
</style>