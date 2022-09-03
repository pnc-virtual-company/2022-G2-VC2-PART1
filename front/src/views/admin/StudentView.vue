<template>
<section>
  <div class="contain" v-if="isViewDetail == false">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <div
      class="modal fade modal-dialog modal-lg obsolute"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="stude-form">
            <div class="add-stu">Edit Student</div>
                 <form @submit.prevent="editStudent(dataUpdate.id)" class="Forms-students">
              <div class="two d-flex">
                <input
                  type="text"
                  class="form-control input-lg m-right"
                  aria-describedby="emailHelp"
                  placeholder="Firstname"
                  v-model="dataUpdate.first_name"
                  >
                
                <input
                  type="text"
                  class="form-control input-lg"
                  aria-describedby="emailHelp"
                  placeholder="Lastname"
                  v-model="dataUpdate.last_name"
                  >
                  
              </div>

              <div class="two d-flex">
                <input
                  type="email"
                  class="form-control input-lg m-right"
                  aria-describedby="emailHelp"
                  placeholder="Email"
                  v-model="dataUpdate.email"
                  >
   
                <input
                  type="tel"
                  class="form-control input-lg"
                  aria-describedby="emailHelp"
                  placeholder="Telephone"
                  v-model="dataUpdate.phone"
                  >

              </div>

              <div class="two d-flex">
                <select
                  class="form-select input-lg m-right"
                  aria-label="Default select example"
                  v-model="dataUpdate.gender"
                  >
                  <option selected disabled>Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>

                <select
                  class="form-select input-lg"
                  aria-label="Default select example"
                  v-model="dataUpdate.batch"
                  >
                 <option selected disabled value="0">Batch</option>
                  <option value="WEB 2022 A">WEB 2022 A</option>
                  <option value="WEB 2022 B">WEB 2022 B</option>
                  <option value="SNA 2022">SNA 2022</option>
                  <option value="WEB 2023 A">WEB 2023 A</option>
                  <option value="WEB 2022 B">WEB 2022 B</option>
                  <option value="SNA 2023">SNA 2023</option>
                </select>
              </div>

              <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal" type="submit"
                >
                  Edit
                </button>
                <button
                  type="button"
                  class="btn btn-danger"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col">
        <label for="status">Filter by batch</label>
        <select
          class="form-select input-lg"
          aria-label="Default select example"
          v-model="batch"
        >
          <option selected disabled value="0">Batch</option>
          <option value="WEB 2022 A">WEB 2022 A</option>
          <option value="WEB 2022 B">WEB 2022 B</option>
          <option value="SNA 2022">SNA 2022</option>
          <option value="WEB 2023 A">WEB 2023 A</option>
          <option value="WEB 2022 B">WEB 2022 B</option>
          <option value="SNA 2023">SNA 2023</option>
        </select>
      </div>
      <div class="col">
        <label for="type">Search By Student's firstname</label>
        <div class="mb-2">
          <input
            type="text"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            v-model="studentName"
          />
        </div>
      </div>

      <div class="col">
        <label for=""></label>
        <section class="btn-search">
          <button
            class="add btn btn-warning text-white"
            type="submit"
            data-bs-toggle="modal" data-bs-target="#staticBackdrop"
          >
            Add +
          </button>
        </section>
      </div>
    </div>
    <div class="success" v-if="addSuccess">
      <div><strong>Success!</strong> New student added.</div>
      <i class="material-icons" @click="addSuccess = false">cancel</i>
    </div>

    <addStudent @add-stu="addStudent" />

    <div class="list">
      <div class="">
        <h4>Student List</h4>
      </div>

      <table class="table">
        <thead>
          <tr class="t-header">
            <th scope="col">STUDENT</th>
            <th scope="col">BATCH</th>
            <th scope="col" class="text-center">ACTION</th>
          </tr>
        </thead>
        <tbody v-for="student of students" :key="student" class="center">
          <tr class="bg-light">
            <td class="fs-5 col-md-3">
              <img
                :src="student.image"
                alt=""
              />
              {{ student.first_name }} {{ student.last_name }}
            </td>
            <td class="fs-6 batch col-md-2">{{ student.batch }}</td>
            <td class="fs-5 col-md-1 text-center">
              <div class="icons">
                <i
                  class="fa fa-id-card text-info fa-1x m-2"
                  @click="studentDetial(student.id)"
                ></i>

                <i 
                  class="fa fa-edit text-warning fa-1x m-2"
                  @click ="dataToUpdate(student.id)"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                ></i>

                <i
                  class="fa fa-trash text-danger fa-1x m-2"
                  @click="deleteStudent(student.id)"
                ></i>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <student-detail v-if="isViewDetail" :student="student"></student-detail>
</section>
</template>

<script>
import StudentDetail from "../../components/student/StudentDetail.vue";
import axiosClient from "../../axios-http";
import Swal from "sweetalert2";

export default {
  emits: ["add-stu", "edit-stu"],
  components: {
    "student-detail": StudentDetail,
  },
  data() {
    return {
      students: [],
      student: [],
      filterStudents: [],
      dataUpdate: {},
      batch: "All Batch",
      studentName: "",
      isViewDetail: false,
      addSuccess: false,
      editSuccess: false,
      studentID: "",
      data: "",
      isEditShow: false,
    };
  },

  methods: {
    getStudents() {
      axiosClient
        .get("admin/students")
        .then((res) => {
          this.students = res.data;
          this.filterStudent = this.students;
        })
    },

    studentDetial(id) {
      axiosClient.get("admin/student/" + id).then((response) => {
        this.student = response.data;
        this.isViewDetail = true;
        console.log(this.student);
      });
    },

    addStudent(student) {
      if (
        student.firstname != "" &&
        student.lastname != "" &&
        student.gender != "" &&
        student.email != "" &&
        student.phone != "" &&
        student.batch != ""
      ) {
        axiosClient.post("admin/students", student, {
          headers: {
            Authorization: "Bearer" + localStorage.getItem("token"),
          },
        });
        this.getStudents();
        this.addSuccess = true;
      }
    },
    deleteStudent(idDelete) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
          if (result.isConfirmed) {
            axiosClient.delete("admin/students/" + idDelete).then((res) => {
              console.log(res);
              this.getStudents();
            });
          }
        })
    },

    dataToUpdate(id) {
      axiosClient.get("admin/students/" + id).then((res) => {
        this.dataUpdate = res.data[0];

      });
    },

    editStudent(id) {
        let dataUpdate = {
          first_name : this.dataUpdate.first_name,
          last_name: this.dataUpdate.last_name,
          email : this.dataUpdate.email,
          phone : this.dataUpdate.phone,
          gender : this.dataUpdate.gender,
          batch : this.dataUpdate.batch
        };
        axiosClient
        .put("admin/students/"+ id, dataUpdate)
        .then((res)=>{
          this.getStudents();
          console.log(res.data);
        })
    }
  },
  mounted() {
    this.getStudents();
    this.dataUpdate;
  },
};
</script>

<style scoped>
.header {
  background-color: #0baec5;
}

.edit {
  background-color: #0baec5;
}
.t-header {
  background: #009db2;
  color: white;
}
.delete {
  background-color: rgb(240, 78, 78);
}
.pro {
  display: flex;
  justify-content: center;
  align-items: center;
}

.name {
  margin-left: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
}

img {
  width: 30px;
  height: 30px;
  border-radius: 30px;
  margin: auto;
}

button {
  border: none;
  width: 100px;
}

i:hover {
  color: black;
}
.add {
  float: right;
  font-size: 15px;
}

.contain {
  margin-top: 20px;
}

.list {
  margin-top: 30px;
  background: rgb(219, 216, 216);
  padding: 1rem;
}

.center {
  align-items: center;
}
.batch {
  margin-top: 0px;
  margin-bottom: 0px;
}
i{
  cursor: pointer;
}
.success {
  background-color: rgb(115, 226, 161);
  border-radius: 7px;
  padding: 0.5rem 0.5rem;
  color: green;
  display: flex;
  justify-content: space-between;
  align-items: center;
  text-align: center;
}

.success i {
  cursor: pointer;
}

i:hover{
  cursor: pointer;
}

.body {
  width: 100%;
  padding: 10px;
  background-color: rgb(174, 215, 238);
}

span {
  color: #ffffff;
  font-weight: bold;
  font-size: 1.3rem;
}
h3 {
  margin: 0 auto;
}
.Forms-students {
  padding: 35px 35px;
  border-bottom-right-radius: 7px;
  border-bottom-left-radius: 7px;
  width: 750px;
  align-items: center;
  margin: auto;
}

.m-right {
  margin-right: 10px;
}

.add-stu {
  display: flex;
  margin: -1rem auto;
  text-align: center;
  justify-content: center;
  background: rgb(122, 178, 230);
  padding: 10px 10px;
  font-size: 25px;
  color: white;
  border-top-left-radius: 7px;
  border-top-right-radius: 7px;
}
.obsolute {
      position: fixed;
      bottom: 0;
      right: 0;
}
input {
  margin-top: 10px;
}

select {
  margin-top: 10px;
}
</style>
