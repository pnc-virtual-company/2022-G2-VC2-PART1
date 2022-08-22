<template>
<div class="leaveDetail">
    <div class="header">
        <hr>
    </div>
  <div class="data-user">
    <div class="profile">
      <div class="img">
        <img :src="showDetail.img"/>
      </div>
      <div class="text">
        <div class="user">
          <h3>{{ showDetail.name }}</h3>
          <span class="date">{{ showDetail.date }}</span>
        </div>
        <div class="message"><p>{{showDetail.message}}</p></div>
    
      </div>
    </div>
    <div class="class">
      <p>{{ showDetail.class }}</p>
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: {
    id: Number,
  },

  inject: ["leaves"],

  data() {
    return {
      leaveInfo: "",
    };
  },
  methods: {
    leaveDetail() {
      for (let leave of this.leaves) {
        if (leave.id == this.id) {
          this.leaveInfo = leave;
        }
      }
    },
  },
  computed: {
    showDetail() {
      this.leaveDetail();
      return this.leaveInfo;
    },
  },
};
</script>

<style scoped>
img {
  width: 100%;
}
.img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 10px;
}
.date {
  position: absolute;
  margin-top: -0.7rem;
}
.message {
   margin-top: 30px;
}
.data-user {
  display: flex;
  justify-content: space-between;
}
.profile {
  display: flex;
}
.leaveDetail{
    margin-top: 20px;
}
</style>
