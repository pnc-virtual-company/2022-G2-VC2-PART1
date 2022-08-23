<template>
  <div class="main">
    <div class="contanier">
      <div class="card"  v-for="(list, index) of leaves" :key="index">
       <div class="card-body">
          <div class="left">
            <h3>{{ list.leave_type }}</h3>
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
            <button  id="reject">Rejecte</button>
          </div>
        </div>
        <div class="card-footer-student">
          <LeaveDetail v-if="list.show" :id="list.id"></LeaveDetail>
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
import axios from '../../axios-http'
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
  provide() {
    return { 
        leaves: this.leaves };
  },
  mounted(){
    this.getLeavesStudent();
  }
};
</script>

<style scoped>
.card {
  width: 98%;
  margin: auto;
  padding: 5px;
  margin-top: 10px;
  border-radius: 5px;
  background-color: #fff;
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
#cancel {
  background-color: pink;
}
#cancel:hover {
  background-color: orange;
}
#approve {
  background-color: #1e86e7;
}
#approve:hover {
  background-color: orange;
}
#reject {
  background-color: #cd342b;
}
#reject:hover {
  background-color: orange;
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
.icon{
    text-align: center;
}
.isChecked {
  background: rgb(185, 41, 41);
}
</style>
