<template>
  <section>
     <StudentNavbar></StudentNavBar>
     <router-view></router-view>
  </section>
</template>

<script>
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import StudentNavbar from './components/navbar/StudentNavbar.vue'

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
