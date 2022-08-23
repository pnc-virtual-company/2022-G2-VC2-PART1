<template>
<div class="leaveDetail">
    <div class="header">
        <hr>
    </div>
    <div class="data-user">
    <div class="data">
      <div class="type">
        <h5>{{list.leave_type}}</h5>
      </div>
        <div class="info">
            <p>Date : from {{list.start_date}} to {{list.end_date}}</p>
            <p>Duration : {{list.duration}} days</p>
            <p>Reason : {{list.reason}}</p>
        </div>
      </div>
  </div>
</div>
</template>

<script>
export default {
  props: {
    id: Number,
    list: Object,
  },

  data() {
    return {
      leaveInfo: "",
    };
  },
};
</script>

<style scoped>
p{
  margin-top: 0em;
  margin-bottom: 0em;
}
.data-user{
  padding: 0;
}
.data{
  margin-left: 20px;
}
</style>
