<template>
  <div class="main">
    <div class="contanier">
      <div class="card" v-for="(list, index) of leaves.slice().reverse()" :key="index"  :class="{background: list.isChecked}" >
        <div class="card-body">
          <div class="profile">
            <div class="img">
              <img id="imgStudent" :src="list.student.image" alt="">
            </div>
            <div class="user">
              <p>{{ list.student.last_name }} {{ list.student.first_name }}</p>
              <p>{{ list.student.batch }}</p>
            </div>
          </div>
          <div class="content">
            <div class="icon-down">
              <i class="fas fa-chevron-down" @click="see_more(list.id)" v-if="list.show == false"></i>
            </div>
          </div>
          <div class="card-action">
            <button :class="{ approve: list.status == 'Padding' }" :disabled="list.status != 'Padding'"
              @click="update_approve(list.id, 'approve')">
              Approve
            </button>
            <button :class="{ reject: list.status == 'Padding' }" :disabled="list.status != 'Padding'"
              @click="update_reject(list.id, 'reject')">
              Reject
            </button>
          </div>
        </div>
        <div class="card-footer-student">
          <LeaveDetail v-if="list.show" :id="list.id" :list="list"></LeaveDetail>
          <div class="icon">
            <i class="fas fa-chevron-up" @click="see_more(list.id)" v-if="list.show"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="noLeave" v-if="leaves.length == 0">
      <h3>No Leave found</h3>
        <img id='imgNoLeave' src="https://icons.veryicon.com/png/o/education-technology/qiniu-cloud-service-icon/content-audit.png" alt="">
      </div>
  </div>

</template>

<script>
import axiosClient from "../../axios-http.js";
import LeaveDetail from "./StudentLeaveDetail.vue";
import Swal from "sweetalert2";
export default {
  components: {
    LeaveDetail,
  },
  data() {
    return {
      leaves: [],
      numberOfNewLeaves:0
    };
  },
  methods: {
    see_more(id) {
      this.leaves.forEach((leave) => {
        if (leave.id == id) {
          this.leave = leave;
          leave.show = !leave.show;
          leave.isChecked=true;
          this.notivcationBg = false;
          axiosClient.get('admin/leaves/ischeck/' + leave.id).then((reponse)=>{
            console.log(reponse.data);
        })
        }
     
      });
      this.getNumberOfNewLeaves()
    },
    getLeavesStudent() {
      axiosClient.get("students/leaves").then((reponse) => {
        this.leaves = reponse.data;
       
      });
    },
    notivcation(bg) {
      this.notivcationBg = bg;
      console.log(this.notivcationBg);
    },
    update_approve(id, my_status) {
      let body = {};
      if (my_status == "approve") {
        body["status"] = "Approved";
        Swal.fire({
          icon: "success",
          title: "Successfully!",
          showConfirmButton: false,
          timer: 2000,
        });
      }
      axiosClient.put("students/leaves/" + id, body).then((reponse) => {
        console.log(reponse);
        this.getLeavesStudent();
      });
    },
    update_reject(id, my_status) {
      let body = {};
      if (my_status == "reject") {

        body["status"] = "Rejected";
        console.log(body);
        Swal.fire({
          title: "Are you sure?",
          text: "You Want To Reject!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, I'm Sure",
        }).then((result) => {
          if (result.isConfirmed) {
            axiosClient.put("students/leaves/" + id, body).then((response) => {
              console.log(response.data.student_id);
              this.getLeavesStudent();
              let user_id = response.data.student_id;
              axiosClient.get('admin/students/' + user_id).then((response) => {
                let user_email = response.data[0].email;
                console.log(response.data);
                let mail_data = { email: user_email, subject: "Rejected for Leaving" }
                console.log(mail_data);
                axiosClient.post('students/send-email', mail_data);
              })
            });
          }
        });
      }
    },
     getNumberOfNewLeaves(){
       axiosClient.get('admin/leaves_nocheck').then(response => {
          this.numberOfNewLeaves = response.data
          this.$emit("number",this.numberOfNewLeaves)
          console.log(this.numberOfNewLeaves);
        })
    },
    send_email() {
      let user_id = localStorage.getItem('user_id');
      axiosClient.get('admin/students/' + user_id).then((response) => {
        let user_email = response.data[0].admin.email;
        let mail_data = { email: user_email, subject: "Asking for Leaving" }
        console.log(mail_data);
        axiosClient.post('students/send-email', mail_data);
      })
    },
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
  width: 90%;
  margin: 0 auto;
}

.card-title {
  display: flex;
  align-items: center;
}

.approve {
  background-color: #0baec5;
}

.approve:hover {
  background-color: #34c3d6;

}

.reject {
  background-color: red;
}

.reject:hover {
  background-color: rgb(243, 96, 96);
}

.card-title:hover {
  background-color: #316970;
}

button {
  border: none;
  padding: 5px 15px;
  border-radius: 5px;
  margin-left: 5px;
  cursor: pointer;
  color: #fff;
  background: rgba(233, 234, 235, 0.945);
}

.main {
  width: 100%;
  margin: 0 auto;
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
#imgNoLeave{
  width: 20%;
}
.noLeave{
  margin-top: 10%;
  text-align: center;
}
#imgStudent{
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
.profile {
  display: flex;
  margin-top: 10px;
}

p {
  margin-top: 0em;
  margin-bottom: 0em;
}

.user {
  margin-left: 10px;
}

.isChecked {
  background: rgb(185, 41, 41);
}
.background{
  background: rgba(13, 97, 133, 0.229);
}
i{

  cursor: pointer;
}
</style>
