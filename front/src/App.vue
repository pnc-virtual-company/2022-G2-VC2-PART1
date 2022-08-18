<template>
  <section>
     <StudentNavbar></StudentNavBar>
     <router-view></router-view>
  </section>
</template>

<script>

import StudentNavbar from './components/studentnav/StudentNavbar.vue'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";


export default ({
    components: {
      StudentNavbar,
    }
})
</script>

<style>
* {
  margin: 0px;
}
</style>
