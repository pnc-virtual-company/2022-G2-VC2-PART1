<template>
  <div>
    <admin-nav v-if="navBar==true"></admin-nav>
    <student-nav v-else-if="navBar==false"></student-nav>
    <form-login v-else>
      
    </form-login>
  </div>
</template>

<script>
import LoginForm from "./components/login/LoginForm.vue";
import AdminNav from "./components/admin/AdminNav.vue";
import StudentNav from "./components/student/StudentNavbar.vue"
export default {
  components: {
    'form-login': LoginForm,
    'admin-nav': AdminNav,
    'student-nav': StudentNav,
  },
  data() {
    return {
      isAdmin: null,
    }
  },
  methods: {
    user_nav() {
      const role = localStorage.getItem('role');
      console.log(role);
      if (role == 1){
        this.isAdmin = true;
      }else if (role == 0){
        this.isAdmin = false;
      }
    },
  },
  computed: {
    navBar() {
      this.user_nav();
      return this.isAdmin;
    }
  },
}
</script>


<style scoped>
</style>