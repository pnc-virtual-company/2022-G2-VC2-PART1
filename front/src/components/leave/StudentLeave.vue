<template>
  <div class="main">
    <div class="contanier">
    <div class="card" v-for="(list, index) of leaves" :key="index">
        <div class="card-body">
          <div class="profile">
            <div class="img">
              <img src="https://freepikpsd.com/file/2019/10/avatar-png-icon-2-Transparent-Images.png" alt="">
            </div>
              <div class="user">
              <p>{{list.student.last_name}} {{list.student.first_name}} </p>
              <p>{{list.student.email}}</p>
          </div>
          </div>
          <div class="content">
            <div class="icon-down">
              <i
                class="fas fa-chevron-down"
                @click="see_more(list.id)"
                v-if="list.show == false"
              ></i>
            </div>
        </div>
          <div class="card-action">
            <button id="approve">Approve</button>
            <button id="reject">Reject</button>
          </div>
    </div>
       <div class="card-footer-student">
          <LeaveDetail
            v-if="list.show"
            :id="list.id"
            :list="list"
          ></LeaveDetail>
          <div class="icon">
            <i
              class="fas fa-chevron-up"
              @click="see_more(list.id)"
              v-if="list.show"

            ></i>
          </div>
        </div>
    </div>
      </div>
      </div>
</template>

<script>
import axios from "../../axios-http";
import LeaveDetail from "./StudentLeaveDetail.vue";
export default {
  components: {
    LeaveDetail,
  },
  data(){
    return{
        leaves : [],
  

    }
  },
  methods: {
    see_more(id) {

      this.leaves.forEach((leave) => {
        if (leave.id == id) {
          this.leave = leave;
          leave.show = !leave.show;
          this.notivcationBg=false
        
        }
        console.log(leave);
      });
    },
    getLeavesStudent(){
        axios.get('leaves').then((reponse)=>{
            this.leaves = reponse.data;
        })
    },
    notivcation(bg){
      this.notivcationBg=bg
      console.log(this.notivcationBg);

    }
  },
  mounted() {
    this.getLeavesStudent();
  },
};
</script>

<style scoped>
.card {
  margin-top: 10px;
}
.card-body {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.contanier {
  padding: 10px;
}
.card-title {
  display: flex;
  align-items: center;
}
#approve {
  background-color: #0baec5;
}
#approve:hover {
  background-color: #316970;
}
#reject {
  background-color: red;
}
#reject:hover {
  background-color: #316970;
}
button {
  border: none;
  padding: 5px;
  border-radius: 5px;
  margin-left: 5px;
  cursor: pointer;
  color: #fff;
}
.main {
  width: 80%;
  margin: auto;
  margin-top: 20px;
}
h2 {
  text-align: center;
  color: #fff;
}
.header {
  background-color: #009db2;
  padding: 5px;
}
.icon-down {
  text-align: center;
}
.left {
  display: flex;
}
.icon {
  text-align: center;
}
img {
  width: 100%;
}
.img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
.profile {
  display: flex;
  margin-top: 10px;
}
p{
  margin-top: 0em;
  margin-bottom: 0em;
}
.user{
  margin-left: 10px;
}
.isChecked {
  background: rgb(185, 41, 41);
}
</style>
