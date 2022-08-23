<template>
  <form @submit.prevent="addNewRequest">
    <div class="success" v-if="success">
      <div><strong>Success!</strong> New request sent.</div>
      <i class="material-icons" @click="success = false">cancel</i>
    </div>
    <h2>New Request</h2>

    <div class="form-group mt-1">
      <label for="">Leaves Type</label>
      <select class="form-select" aria-label="Default select example" v-model="leave_type">
        <option value="" selected disabled>Choose Leave Type</option>
        <option value="Sick Leave">Sick Leave</option>
        <option value="Family Event">Family's Event</option>
        <option value="Personal Event">Personal Event</option>
        <option value="Sister/Brother Event">Sister/Brother Event</option>
      </select>
      <small class="text-danger" v-if="leave_type_validate">Choose your Leaves Type</small>
    </div>

    <div class="form-group mt-1">
      <label for="">Start Date</label>
      <div class="row">
        <div class="col">
          <input type="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control"
            v-model="start_date" :min="getCurrentDate" />
          <small class="text-danger" v-if="start_date_validate">Choose your Start Date</small>
        </div>
        <div class="col">
          <select class="form-select" aria-label="Default select example" v-model="start_time">
            <option selected disabled value="">Choose Time</option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
          </select>
          <small class="text-danger" v-if="start_time_validate">Choose your Leave Time</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-1">
      <label for="">End Date</label>
      <div class="row">
        <div class="col">
          <input type="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control"
            v-model="end_date" :min="getCurrentDate" />
          <small class="text-danger" v-if="end_date_validate">Choose your End Date</small>
          <small class="text-danger" v-if="!isBig">End Date should be biger than the start date</small>
        </div>
        <div class="col">
          <select class="form-select" aria-label="Default select example" v-model="end_time">
            <option selected disabled value="">Choose Time</option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
          </select>
          <small class="text-danger" v-if="end_time_validate">Choose your Leave Time</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-1">
      <label for="">Duration: <span>{{ count_day }} day</span></label>
    </div>
    <div class="form-group mt-1">
      <label for="">Message Cause</label>
      <textarea type="text" class="form-control mt-2" placeholder="message" v-model="reason"></textarea>
    </div>
    <div class="btn-submit">
      <button type="submit" class="btn btn-warning" @click="validation">SUBMIT</button>
    </div>
  </form>

</template>
<script>
import moment from "moment";

export default {
  data() {
    return {
      start_date: "",
      end_date: "",
      leave_type: "",
      start_time: "",
      end_time: "",
      status: "Padding",
      reason: "",
      leave_type_validate: false,
      start_validate: false,
      end_date_validate: false,
      start_time_validate: false,
      end_time_validate: false,
      isBig: true,
      success: false,
      student_id:1
    };
  },

  methods: {
    addNewRequest() {
      if (this.end_date >= this.start_date && this.leave_type.trim().length > 0 && this.start_time.trim().length > 0 && this.end_time.trim().length > 0){
        let obj = {
          student_id:this.student_id,
          start_date: this.start_date,
          start_time: this.start_time,
          end_date: this.end_date,
          end_time: this.end_time,
          leave_type: this.leave_type,
          reason: this.reason,
          status: this.status,
          duration: this.count_day,
        };
        this.$emit("add-data", obj);

        (this.start_date = ""),
          (this.end_date = ""),
          (this.leave_type = ""),
          (this.start_time = ""),
          (this.end_time = ""),
          (this.status = "Padding"),
          (this.reason = "");
        this.success = true;
      }
    },
    validation() {
      if (this.leave_type.trim().length == 0) {
        this.leave_type_validate = true;
      } else {
        this.leave_type_validate = false;
      }
      if (this.start_date.trim().length == 0) {
        this.start_date_validate = true;
      } else {
        this.start_date_validate = false;
      }
      if (this.end_date.trim().length == 0) {
        this.end_date_validate = true;
      } else {
        this.end_date_validate = false;
      }
      if (this.start_time.trim().length == 0) {
        this.start_time_validate = true;
      } else {
        this.start_time_validate = false;
      }
      if (this.end_time.trim().length == 0) {
        this.end_time_validate = true;
      } else {
        this.end_time_validate = false;
      }
      if (this.end_date < this.start_date) {
        this.isBig = false;
      } else {
        this.isBig = true;
      }
    }
  },
  currentDate() {
    const current = new Date();
    const date = `${current.getDate()}/${current.getMonth() + 1}/${current.getFullYear()}`;
    return date;
  },
  computed: {
    count_day() {
      let timeStart = this.start_time;
      let timeEnd = this.end_time;
      let start = moment(this.start_date);
      let end = moment(this.end_date);
      let result = 0;

      if (!isNaN(end.diff(start, "days"))) {
        if (end >= start) {
          result += end.diff(start, "days");
          if (
            (timeStart == "Morning" && timeEnd == "Morning") || (timeStart == "Afternoon" && timeEnd == "Afternoon")
          ) {
            result += 0.5;
          }

          if (
            (timeStart == "Morning" && timeEnd == "Afternoon") || (timeStart == "Afternoon" && timeEnd == "Morning")
          ) {
            result += 1;
          }
        }
      }
      return result;
    },
    getCurrentDate() {
      var date = new Date();
      var tday = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getUTCFullYear();
      if (tday < 10) {
        tday = "0" + tday
      }
      if (month < 10) {
        month = "0" + month
      }
      return year + "-" + month + "-" + tday
    },
  },

};
</script>

<style scoped>
form {
  width: 40%;
  margin: auto;
  padding: 1.5rem;
  background: #ffffff;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  border-radius: 7px;
  margin-top: 0.6rem;
  box-sizing: border-box;
}

label {
  margin-left: 0;
}

form-group {
  margin: 0;
  padding: 0;
  margin: auto;
  margin-left: 5px;
}

h2 {
  text-align: center;
  color: aqua;
  margin-top: 0;
}

.btn {
  margin-top: 10px;
  color: white;
}

.form-group {
  margin-top: 2px;
}

label {
  margin-left: 10px;
}

.duration {
  width: 6%;
  outline: none;
}

input {
  background-color: #d9d9d9;
}

span {
  color: red;
}

select {
  background-color: #d9d9d9;
}

textarea {
  background-color: #d9d9d9;
}

template {
  background: #eeeeee;
}

textarea {
  resize: none;
}

.btn-submit {
  display: flex;
  justify-content: flex-end;
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
