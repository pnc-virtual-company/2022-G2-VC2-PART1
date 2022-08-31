<template>
  <section>
    <requestform @add-data="addRequest"/>
  </section>
</template>

<script>
import requestform from "../../components/student/RequestForm.vue";
export default {
  components: {
   requestform,
  },
};
</script>

<style></style>