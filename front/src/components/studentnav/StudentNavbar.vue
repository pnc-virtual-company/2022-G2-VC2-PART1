<template>
  <div class="nav">
    <nav class="left">
      <span class="logo">PNC SLMS</span>
      <div class="twolink">
        <router-link to ='/student/leave' class="active" >List all leave</router-link>
        <router-link to ='/student/request' class="active" >New Request</router-link>
      </div>
    </nav>
    <nav class="right">
      <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="profile">Phandy Phorn</span>
      <router-link to= '/student/signout' >Sign Out</router-link>
    </nav>
  </div>
</template>
<script>
export default {
  components: {
    
  }
}
</script>


<style scoped>
  nav a{
    color: #ffffff;
    margin: 10px;
    text-decoration: none;
    padding: 10px;
    align-items: center;
  }
  nav a.router-link-exact-active.active {
    background-color: #F2AE00;
    padding: 10px;
    align-items: center;
    border-radius: 5px;
  }
  .right {
    font-size: 1.2rem;
  }

  .left {
    display:flex;
    font-size: 1.2rem;
  }
  .body {
    width: 100%
  }
  .nav {
    display: flex;
    justify-content: space-between;
    background-color: #0BAEC5;
    padding: 21px;
  }
  .logo {
    color: #F2AE00;
    text-shadow: 2px 2px #0f0f0f;
  }
  .profile {
    cursor: pointer;
  }
  span {
    color: #ffffff;
    font-weight: bold;
    font-size: 1.3rem;
  }
  .twolink {
    margin-left: 20px;
  }
</style>