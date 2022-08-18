<template>
  <form @submit.prevent="addNewRequest">
    <h1>New Request</h1>

    <div class="form-group">
      <label for="">Leaves Type</label>
      <select
        class="form-select"
        aria-label="Default select example"
        v-model="leave_type"
        required
      >
        <option value="" selected disabled>Choose Leave Type</option>
        <option value="Sick Leave">Sick Leave</option>
        <option value="Family Event">Family's Event</option>
        <option value="Personal Event">personal Event</option>
      </select>
    </div>

    <div class="form-group y-5">
      <label for="">Start Date</label>
      <div class="row">
        <div class="col">
          <input
            type="date"
            placeholder="yyyy-mm-dd"
            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
            required
            class="form-control"
            v-model="start_date"
          />
        </div>
        <div class="col">
          <select
            class="form-select"
            aria-label="Default select example"
            v-model="start_time"
            required
          >
            <option selected disabled value="">Choose Time</option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group y-5">
      <label for="">End Date</label>
      <div class="row">
        <div class="col">
          <input
            type="date"
            placeholder="yyyy-mm-dd"
            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
            required
            class="form-control"
            v-model="end_date"
          />
        </div>
        <div class="col">
          <select
            class="form-select"
            aria-label="Default select example"
            v-model="end_time"
            required
          >
            <option selected disabled value="">Choose Time</option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group y-5">
      <label for=""
        >Duration: <span>{{ count_day }} day</span></label
      >
    </div>
    <div class="form-group y-5">
      <label for="">Message Cause</label>
      <textarea
        type="text"
        class="form-control"
        placeholder="message"
        v-model="reason"
        required
      ></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-warning">SUBMIT</button>
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
    };
  },

  methods: {
    addNewRequest() {
      let obj = {
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
    },
    // emite: ['add-data']
  },
  computed: {
    count_day() {
      let timeStart = this.start_time;
      let timeEnd = this.end_time;
      let start = moment(this.start_date);
      let end = moment(this.end_date);
      let result =0;
      if (!isNaN(end.diff(start, "days"))) {
        result += end.diff(start, "days");
        if (
          (timeStart == "Morning" && timeEnd == "Morning")||(timeStart == "Afternoon" && timeEnd == "Afternoon")
        ) {
          result += 0.5;
        }
        
        if (
          (timeStart == "Morning" && timeEnd == "Afternoon")||(timeStart == "Afternoon" && timeEnd == "Morning")
        ) {
          result += 1;
        }
      }

      return result;
    },
  },
};
</script>

<style scoped>
form {
  width: 50%;
  margin: auto;
  padding: 2rem;
  background: #ffffff;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
label {
  margin-left: 0;
}
form-group {
  margin: auto;
  margin-left: 5px;
}
h1 {
  text-align: center;
  color: aqua;
}
.btn {
  display: flex;
  margin: auto;
  text-align: center;
  margin-top: 10px;
  color: white;
}
.form-group {
  margin-top: 20px;
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
</style>
