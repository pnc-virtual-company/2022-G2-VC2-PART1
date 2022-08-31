<template>
  <div class="all-navbar">
    <div class="nav-admin">
      <div class="sidebar-left">
        <header>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
          <div class="profile"  v-for="profile of adminData" :key="profile">
            <img
             :src="profile.image"
              alt="">
            <div class="bg-profile"></div>
            <label for="file"><i class="fas fa-camera"></i></label>
            <input type="file" id="file" 
             name="image"
             hidden
             @change="imgProfile"
            />
          </div>
          <div class="profile-infor">
            <div class="pro-username">
              Sarath Orn
            </div>
            <div class="pro-email">
              sarathorn@gmail.com
            </div>
          </div>
        </header>
        <ul class="main-admin">
          <router-link to='/dashboard' class="active"><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a>
          </router-link>
          <router-link to='/student_lists' class="active"><a href="#"><i class="fas fa-user-graduate"></i>Students</a>
          </router-link>
          <router-link to='/leave_menu' class="active"><a href="#"><i class="fas fa-bell"><span
                  class="badge">3</span></i>Check Leaves</a></router-link>
        </ul>
      </div>
      <div class="nav-admin-bar">
        <div class="nav-bar">
          <div class="logo">PNC SLMS</div>
          <div class="nav-user-infor">
            <div class="username">
              Sarath Orn
            </div>
            <span @click="logout" id="logout"><i class="bi bi-box-arrow-right"></i></span>
          </div>
        </div>
        <div class="container">
          <router-view />
        </div>
      </div>
    </div>
  </div>

</template>
  
  <script>
  import axiosClient from "../../axios-http";
export default {
  data() {
    return {
      drawer: null,
      adminData: [],
      adminProfile: "",
    }
  },
  methods: {
    logout() {
      localStorage.clear();
      setTimeout(function () {
        window.location.reload();
      }, 80);
    }, 
    getAdmin() {
      axiosClient.get("admin/admins",{
        header:{
          Authorization:'Bearer' + localStorage.getItem('token')
        }
      }).then((reponse) => {
        this.adminData = reponse.data;
        localStorage.setItem('id',reponse.data[0].id)
        console.log(this.adminData);
      });
    },
    async imgProfile(event) {
      const id = localStorage.getItem('id');
      this.adminProfile = event.target.files[0];
      console.log(this.adminProfile);
      const body = new FormData();
      body.append('image',this.adminProfile)
      body.append('_method', 'PUT')
      axiosClient.post("admin/admins_profile/"+id,body).then((reponse) => {
        console.log(reponse);
        this.getAdmin();
      });

    },

  },
  mounted() {
    this.getAdmin();
  },
}
</script>
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');
  
  * {
    padding: 0;
    margin: 0;
    list-style: none;
    text-decoration: none;
  }
  
  .container {
    width: 100%;
    height: 90vh;
    overflow-y: scroll;
  
  }
  
  body {
    font-family: 'Roboto', sans-serif;
  }
  
  .nav-admin {
    display: flex;
  }
  
  .nav-admin-bar {
    width: 100%;
    
  }
  
  #logout {
    color: white;
    margin-left: 10px;
    margin-right: 20px;
  }
  
  #logout i {
    font-size: 25px;
  }
  
  #logout i:hover {
    cursor: pointer;
    color: rgb(228, 218, 218);
  }
  .username{
    color: white;
  }
  .nav-bar {
    width: 100%;
    height: 9vh;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #009DB2;
  }
  
  .nav-user-infor {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .sidebar-left {
    width: 21%;
    background: rgba(176, 179, 181, 0.945);
  }
  
  .main {
    background: rgb(199, 205, 208);
    height: 200vh;
  }
  
  header {
    background: #c1b9b9;
    user-select: none;
  
  }
  
  ul a {
    display: block;
    height: 100%;
    width: 100%;
    line-height: 65px;
    font-size: 20px;
    color: rgb(0, 0, 0);
    background: rgba(196, 196, 196, 0.401);
    padding-left: 8px;
    box-sizing: border-box;
    border-top: 1px solid rgba(66, 66, 66, 0.1);
    transition: .4s;
  }
  
  ul a:hover a {
    padding-left: 20px;
  }
  
  ul a i {
    margin-right: 16px;
  }
  
  .logo {
    color: #F2AE00;
    text-shadow: 1px 1px black;
    font-size: 1.3rem;
    font-weight: bold;
    margin-left: 1rem;
  }
  
  .logout {
    margin: 0 14px;
    cursor: pointer;
  }
  
  .username {
    font-weight: 500;
    font-size: 1.3rem;
    margin: -4px 5px;
  
  }
  
  .profile img {
    width: 89px;
    height: 89px;
    border-radius: 50%;
    margin: 12px 20px;
  }
  
  .profile-infor {
    margin-left: 1.4rem;
    padding-bottom: 1rem;
  
  }
  
  .profile-infor .pro-username {
    font-weight: 500;
    font-size: 1.3rem;
  }
  
  .profile-infor .pro-email {
    color: #2e3030;
  
  }
  
  .badge {
    position: absolute;
    margin: -12px;
    padding: 1px 5px;
    border-radius: 50%;
    background-color: red;
    color: white;
  }
  
  .profile i {
    text-decoration: none;
    position: absolute;
    margin: 1.1rem -4.5rem;
    color: #d7ebeb;
  }
  
  .bg-profile {
      width: 150px;
    height: 200px;
    border-radius: 0 0 60% 50%;
    clip-path: ellipse(27% 15% at 46% 0%);
    position: absolute;
    margin: -2.6rem -0.3rem;
    background: rgba(99, 106, 99, 0.588);
  }
  
  ul a.router-link-exact-active.active {
    background-color: #F2AE00;
  
  }
  </style>