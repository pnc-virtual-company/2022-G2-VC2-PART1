<template>
  <section>
    <div
      class="modal fade modal-lg"
      id="staticBackdrop"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="stude-form">
            <div class="add-stu">Add Student</div>
            <form
              @submit.prevent="addStudent()"
              class="Forms-students"
              action=""
            >
              <div class="two d-flex">
                <input
                  type="text"
                  class="form-control input-lg m-right"
                  aria-describedby="emailHelp"
                  placeholder="Firstname"
                  v-model="firstname"
                />
                <input
                  type="text"
                  class="form-control input-lg"
                  aria-describedby="emailHelp"
                  placeholder="Lastname"
                  v-model="lastname"
                />
              </div>

              <div class="two d-flex">
                <input
                  type="email"
                  class="form-control input-lg m-right"
                  aria-describedby="emailHelp"
                  placeholder="Email"
                  v-model="email"
                />
                <input
                  type="tel"
                  class="form-control input-lg"
                  aria-describedby="emailHelp"
                  placeholder="Telephone"
                  v-model="phone"
                />
              </div>

              <div class="two d-flex">
                <select
                  class="form-select input-lg m-right"
                  aria-label="Default select example"
                  v-model="gender"
                >
                  <option selected disabled>Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>

                <select
                  class="form-select input-lg"
                  aria-label="Default select example"
                  v-model="batch"
                >
                  <option selected disabled>All Batch</option>
                  <option value="2022 WEB A">2022 WEB A</option>
                  <option value="2022 WEB B">2022 WEB B</option>
                  <option value="2022 SNA">2022 SNA</option>
                  <option value="2023 WEB A">2023 WEB A</option>
                  <option value="2023 WEB B">2023 WEB B</option>
                  <option value="2023 SNA">2023 SNA</option>
                  <option value="2024 A">2024 A</option>
                  <option value="2024 B">2024 B</option>
                  <option value="2024 C">2024 C</option>
                  <option value="2024 D">2024 D</option>
                </select>
              </div>

              <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">
                  Add
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
  data() {
    return {
      firstname: "",
      lastname: "",
      gender: "",
      email: "",
      phone: "",
      batch: "",
      students: [],
    };
  },
  methods: {
    addStudent() {
      const admin_id = localStorage.getItem("user_id");
      let student = {
        admin_id: admin_id,
        first_name: this.firstname,
        last_name: this.lastname,
        gender: this.gender,
        batch: this.batch,
        email: this.email,
        phone: this.phone,
      };
      if (
        this.email.includes('@student.passerellesnumeriques.org')
      ) {
         this.$emit("add-stu", student);
      }else{
        alert('Only PNC email is available! Firstname.Lastname@student.passerellesnumeriques.org')
      }
      
      this.firstname = "";
      this.lastname = "";
      this.sexs = "";
      this.batch = "";
      this.email = "";
      this.phone = "";
    },
  },
};
</script>

<style scoped>
* {
  margin-top: 10px;
}

.Forms-students {
  padding: 35px 35px;
  border-bottom-right-radius: 7px;
  border-bottom-left-radius: 7px;
  width: 750px;
  align-items: center;
  margin: auto;
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

.m-right {
  margin-right: 10px;
}
</style>