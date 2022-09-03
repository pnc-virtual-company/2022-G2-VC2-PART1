<template>
  <div class="contain">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
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
    <editStudent @edit-stu="edit(dataUpdate.id)"  :dataUpdate="update"/>

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
                <i class="fa fa-id-card text-info fa-1x m-2"></i>

                <i 
                  class="fa fa-edit text-warning fa-1x m-2"
                  @click="dataToUpdate(student.id)"
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
</template>

<script>
import axiosClient from "../../axios-http";
import Swal from "sweetalert2";

export default {
  emits: ["add-stu", "edit-stu"],
  data() {
    return {
      students: [],
      filterStudents: [],
      dataUpdate: {},
      batch: "All Batch",
      studentName: "",
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
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
      });
    },
// ==============================================
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
        })
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
      this.studentID = id
      console.log(this.studentID)
      axiosClient.get("admin/students/" + id).then((res) => {
        this.dataUpdate = res.data;
        console.log(this.dataUpdate);
      });
    },

    edit(id) {
      const admin_id = localStorage.getItem("user_id");
        let dataUpdate = {
          admin_id: admin_id,
          first_name : this.dataUpdate.first_name,
          last_name: this.dataUpdate.last_name,
          email : this.dataUpdate.email,
          phone : this.dataUpdate.phone,
          gender : this.dataUpdate.gender,
          batch : this.dataUpdate.batch
        };
        console.log("I am just get from edit form" + dataUpdate)
      axiosClient
      .put("admin/students/" + id, dataUpdate)
      .then((res)=>{
        setTimeout(function(){
          window.location.reload();
        });
        this.dataUpdate = res.data
      })
    }


  },
  computed: {
    update() {
      this.dataToUpdate();
      console.log(this.dataUpdate)
      return this.dataUpdate;
    }
  },

  mounted() {
    console.log('jgjgh');
    this.getStudents();
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
</style>