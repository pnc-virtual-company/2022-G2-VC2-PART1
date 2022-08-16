<template>
  <div class="nav">
    <nav class="left">
      <span class="logo">PNC SLMS</span>
      <router-link to ='/leave' class="active" >List all leave</router-link>
      <router-link to ='/request' class="active" >New Request</router-link>
    </nav>

    <nav class="right">
      <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="profile">Phandy Phorn</span>
      <router-link to= '/signout' >Sign Out</router-link>
    </nav>
  </div>
</template>

<script>
export default {
}
</script>


<style scoped>
  nav a{
    color: #ffffff;
    margin: 20px;
    text-decoration: none;
  }
  nav a.router-link-exact-active.active {
    background-color: #F2AE00;
    padding: 23px 8px 23px 8px;
    align-items: center;
  }
  .right {
    margin-top: -3px;
    font-size: 1.2rem;
  }

  .left {
    margin-top: -3px;
    font-size: 1.2rem;
  }
  .body {
    width: 100%
  }
  .nav {
    display: flex;
    justify-content: space-between;
    background-color: #0BAEC5;
    padding: 23px;
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
</style>