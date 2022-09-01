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
          class="form-select form-select-sm m-1"
          id="status"
          aria-label=".form-select-sm example"
          v-model="batch"
        >
          <option selected disabled>All Batch</option>
          <option value="Web 2022 A">Web 2022 A</option>
          <option value="Web 2022 B">Web 2022 B</option>
          <option value="Web 2022 C">Web 2022 C</option>
          <option value="Web 2023 A">Web 2023 A</option>
          <option value="Web 2023 B">Web 2023 B</option>
          <option value="Web 2023 C">Web 2023 C</option>
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
          <button class="btn btn-warning pt-1 pb-1 pl-2 pr-2 mt-1 text-white">
            Search
          </button>
        </section>
      </div>
    </div>

    <button
      class="add btn btn-warning text-white"
      type="submit"
      data-bs-toggle="modal"
      data-bs-target="#staticBackdrop"
    >
      Add +
    </button>
    <addStudent @add-stu="addStudent" />
    
    <editStudent/>

    <br />
    <div class="list">
      <div class="">
        <h4>Student List</h4>
      </div>

      <table class="table">
        <thead>
          <tr class="t-header">
            <th scope="col">STUDENT</th>
            <th scope="col">BATCH</th>
            <th scope="col" class="text-center" >ACTION</th>
          </tr>
        </thead>
        <tbody v-for="student of students" :key="student" class="center">
          <tr class="bg-light">
            <td class="fs-5 col-md-3">
              <img
                src="https://cdn.britannica.com/84/73184-004-E5A450B5/Sunflower-field-Fargo-North-Dakota.jpg"
                alt=""
              />
              {{ student.first_name }} {{ student.last_name }}
            </td>
            <td class="fs-6 batch col-md-2">{{ student.batch }}</td>
            <td class="fs-5 col-md-1 text-center">
              <div class="icons">
                <i class="fa fa-id-card text-info fa-1x m-2"
                ></i>
                <i class="fa fa-edit text-warning fa-1x m-2"
                data-bs-toggle="modal" data-bs-target="#exampleModal"
                @click="dataToUpdate(student.id)"
                
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

export default {
  emits: ["add-stu"],
  data() {
    return {
      students: [],
      filterStudents: [],
      dataUpdate: {},
      batch: "All Batch",
      studentName: "",
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
        .catch((err) => {
          console.log(err);
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
        this.students.push(student);
        axiosClient.post("admin/students", student, {
          headers: {
            Authorization: "Bearer" + localStorage.getItem("token"),
          },
        });

      }
    },

    deleteStudent(idDelete) {
      axiosClient
        .delete("admin/students/" + idDelete)
        .then((res) => {
          console.log(res);
          this.getStudents();
        })
    },

    dataToUpdate(id) {
      axiosClient
        .get("admin/students/" + id)
        .then((res) => {
          this.dataUpdate = res.data;
        })
    },

  },

  mounted() {
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
  background: #009DB2;
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
</style>