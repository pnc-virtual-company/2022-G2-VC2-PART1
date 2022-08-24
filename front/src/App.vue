<template>
  <div class="all-navbar">
    <div class="nav-admin">
      <div v-if="isAdmin" class="sidebar-left">
        <header>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
                <div class="profile">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQV7tpS0h4kD2u8DPugIhAmwqBlJEZw0hozJA&usqp=CAU" alt="">
                  <div class="bg-profile"></div>
                  <label for="file"><i class="fas fa-camera"></i></label>
                  <input type="file" id="file" name="file" multiple hidden>
                  
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
          <router-link to ='/dashbord_menu' class="active"><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></router-link>
          <router-link to ='/student_lists' class="active" ><a href="#"><i class="fas fa-user-graduate"></i>Students</a></router-link>
          <router-link to ='/leave_menu' class="active" ><a href="#"><i class="fas fa-bell"><span class="badge">3</span></i>Checked Leaves</a></router-link>
        </ul>
      </div>
      <div v-if="isAdmin" class="nav-admin-bar">
        <div class="nav-bar">
            <div class="logo">PNC SLMS</div>
            <div class="nav-user-infor">
              <div class="username">
                Sarath Orn
              </div>
              <div class="logout">
                Logout
              </div>

            </div>
        </div>
        <div class="container">
            <router-view/> 

        </div>
      </div>
    </div>
    <div class="nav-bar-student" v-if="!isAdmin" >
        <navStudent/>
        <router-view/> 
    </div>
  </div>
   
</template>

<script>
  export default {
    data(){ 
      return{
        drawer: null,
        isAdmin: false,       
      }

       },

  }
</script>


<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');
*{
  padding: 0;
  margin: 0;
  list-style: none;
  text-decoration: none;
}
.container{
 width: 100%;
  height: 100vh;
 overflow-y: scroll;

}

body {
  font-family: 'Roboto', sans-serif;
}
.nav-admin{
  display: flex;
}
.nav-admin-bar{
  width: 100%;
}
.nav-bar{
  width: 100%;
  height: 9vh;
  display: flex;
  background: rgb(166, 164, 164);
  justify-content: space-between;
  align-items: center;
}
.nav-user-infor{
  display: flex;
}
.sidebar-left{
  width: 21%;
  background: rgb(212, 212, 212);
}


.main{
  background: rgb(199, 205, 208);
  height: 200vh;
}
header {
  background: #C1B9B9;
  user-select: none;

}
ul a{
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

ul a:hover a{
  padding-left: 20px;
}
 ul a i{
  margin-right: 16px;
}



.logo{
  color: #F2AE00;
  text-shadow: 1px 1px black;
  font-size: 1.3rem;
  font-weight: bold;
  margin-left: 1rem;
 

}

.logout{
  margin:0 14px;
  cursor: pointer;
}
.username{
  font-weight: 500;
  font-size: 1.3rem;
  margin: -4px 5px;
  
}
.profile img{
  width: 80px;
  height: 80px;
  border-radius: 50%;
  margin: 12px 20px;

}
.profile-infor{
  margin-left: 1.4rem;
  padding-bottom: 1rem;
 
}
.profile-infor .pro-username{
  font-weight: 500;
  font-size: 1.3rem;
}
.profile-infor .pro-email{
  color: #2e3030;
  
}
.badge {
  position: absolute;
  margin: -12px ;
  padding: 1px 5px;
  border-radius: 50%;
  background-color: red;
  color: white;
}

.profile i{
  text-decoration: none;
  position: absolute;
  margin:1rem -4.3rem;
  color: #d8e5e5;
}
.bg-profile{
  width: 150px;
  height: 200px;
  border-radius:  0 0 60%  50% ;
  clip-path: ellipse(27% 15% at 46% 0%);
  position: absolute;
  margin: -2.3rem -0.6rem;
  background: rgba(196, 212, 198, 0.254);
}
ul a.router-link-exact-active.active {
    background-color: #F2AE00;
    
  }
.nav-bar{
  background: #009DB2;
}


</style>