<template>
  <leave-list :leaves="leave_list"></leave-list>
</template>

<script>
import LeaveList from '@/components/leave/LeaveList.vue'
import axios from '../../axios-http'
export default {
  components: {
    'leave-list': LeaveList
  },
  data() {
    return {
      leaves: [],
    }
  },
  methods: {
    fetch_data() {
      axios.get('leaves').then(response => {
        this.leaves = response.data
      })
    }
  },
  computed:{
    leave_list(){
      return this.leaves;
    }
  },
  mounted() {
    this.fetch_data();
  }
}
</script>

<style>
</style>