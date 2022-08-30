<template>
  <div class="student-nav">
    <div class="nav">
      <nav class="left">
        <span class="logo">PNC SLMS</span>
        <div class="twolink">
          <router-link to='/student/leave' class="active">List all leave</router-link>
          <router-link to='/student/request' class="active">New Request</router-link>
        </div>
      </nav>
      <nav class="right">
        <span data-bs-toggle="modal" data-bs-target="#exampleModal" id="profile" class="profile">Phandy Phorn</span>
        <span @click="logout" id="logout"><i class="bi bi-box-arrow-right"></i></span>
      </nav>
    </div>
    <div class="container">
      <router-view />
    </div>
  </div>
</template>
<script>
export default {
  components: {

  },
  methods: {
    logout() {
      localStorage.clear();
      setTimeout(function () {
        window.location.reload();
      }, 80);
    }
  },
}
</script>


<style scoped>
nav a {
  color: #ffffff;
  text-decoration: none;
  padding: 7px;
  align-items: center;
}

.nav {
  width: 100%;
}

nav a.router-link-exact-active.active {
  background-color: #F2AE00CC;
  padding: 7px;
  text-align: center;
  border-radius: 5px;

}

.right {
  font-size: 1.2rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.left {
  display: flex;
  font-size: 1.2rem;
  align-items: center;
}

.body {
  width: 100%
}

.nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #0BAEC5;
  padding: 5px 20px 5px 20px;
}

.logo {
  color: #f2ad00d8;
  text-shadow: 1px 1px #0f0f0f;
}
#logout{
  color: white;
  margin-left: 10px;
}
#logout i{
  font-size: 25px;
}
#logout i:hover{
  cursor: pointer;
  color: rgb(228, 218, 218);
}
.profile:hover {
  cursor: pointer;
  color: rgb(228, 218, 218);
}

#profile {
  color: #ffffff;
  font-weight: bold;
  font-size: 1.3rem;
}

.twolink {
  margin-left: 2rem;
  text-align: center;
  padding: 8px;
}

#sign-out:hover {
  color: rgb(223, 219, 219);
}
</style>