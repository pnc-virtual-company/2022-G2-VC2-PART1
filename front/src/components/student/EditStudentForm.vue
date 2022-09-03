<template>
  <section>
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
            <form @submit.prevent="edit()" class="Forms-students">
              <div class="two d-flex">
                <input
                  type="text"
                  class="form-control input-lg m-right"
                  aria-describedby="emailHelp"
                  placeholder="Firstname"
                  v-model="student_edit.first_name"
                  >
                
                <input
                  type="text"
                  class="form-control input-lg"
                  aria-describedby="emailHelp"
                  placeholder="Lastname"
                  v-model="student_edit.last_name"
                  >
                  
              </div>

              <div class="two d-flex">
                <input
                  type="email"
                  class="form-control input-lg m-right"
                  aria-describedby="emailHelp"
                  placeholder="Email"
                  v-model="student_edit.email"
                  >
   
                <input
                  type="tel"
                  class="form-control input-lg"
                  aria-describedby="emailHelp"
                  placeholder="Telephone"
                  v-model="student_edit.phone"
                  >

              </div>

              <div class="two d-flex">
                <select
                  class="form-select input-lg m-right"
                  aria-label="Default select example"
                  v-model="student_edit.gender"
                  >
                  <option selected disabled>Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>

                <select
                  class="form-select input-lg"
                  aria-label="Default select example"
                  v-model="student_edit.batch"
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
  </section>
</template>

<script>
  export default {
    props: ['dataUpdate'],
    data() {
      return {
        student_edit: this.dataUpdate
      }
    },
    methods: {
      edit() {
        this.$emit("student_edit")
      }
    },

    computed: {
      dataToUpdate(){
        return this.dataUpdate;
      }
      
    },

    mounted() {
      this.student_edit
    },

  }
  
</script>

<style scoped>
* {
  margin-top: 10px;
}
.obsolute {
  position: fixed;
  bottom: 0;
  right: 0;
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
</style>