<template>
  <section>
    <requestform @add-data="addRequest"/>
  </section>
</template>

<script>
import axios from "../axios-http.js";
import requestform from "../components/student/RequestForm.vue";
export default {
  components: {
   requestform,
  },
  data() {
    return {
      request:[],
     
    };
  },
  
  methods: {
    getRequest() {
      axios.get("/leaves").then((response) => {
        console.log(response.data);
      });
    },

    addRequest(body) {
      axios.post("/leaves",body)
      this.getRequest()
    
    },
  },
  mounted() {
    this.getRequest();
  },
};
</script>

<style></style>