<template>
  <section>
     <StudentNavbar></StudentNavBar>
     <router-view></router-view>
  </section>
</template>

<script>
import StudentNavbar from './components/studentnav/StudentNavbar.vue'
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
