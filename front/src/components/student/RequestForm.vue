<template>
  <form @submit.prevent="addNewRequest">
    <h1>New Request</h1>

    <div class="form-group">
      <label for="">Leaves Type</label>
      <select class="form-select" aria-label="Default select example" v-model="leave_type" @click="validate">
        <option value="" selected disabled>Choose Leave Type</option>
        <option value="Sick Leave">Sick Leave</option>
        <option value="Family Event">Family's Event</option>
        <option value="Personal Event">personal Event</option>
      </select>
      <small class="text-danger" v-if="leave_type_validate">Choose your Leaves Type</small>
    </div>

    <div class="form-group">
      <label for="">Start Date</label>
      <div class="row">
        <div class="col">
          <input type="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control"
            v-model="start_date"/>
          <small class="text-danger" v-if="start_date_validate">Choose your Start Date</small>
        </div>
        <div class="col">
          <select class="form-select" aria-label="Default select example" v-model="start_time" @click="validate">
            <option selected disabled value="">Choose Time</option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
          </select>
          <small class="text-danger" v-if="start_time_validate">Choose your Leave Time</small>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="">End Date</label>
      <div class="row">
        <div class="col">
          <input type="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control"
            v-model="end_date" />
          <small class="text-danger" v-if="end_date_validate">Choose your End Date</small>
        </div>
        <div class="col">
          <select class="form-select" aria-label="Default select example" v-model="end_time" @click="validate">
            <option selected disabled value="">Choose Time</option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
          </select>
          <small class="text-danger" v-if="end_time_validate">Choose your Leave Time</small>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="">Duration: <span>{{ count_day }} day</span></label>
    </div>
    <div class="form-group">
      <label for="">Message Cause</label>
      <textarea type="text" class="form-control mt-2" placeholder="message" v-model="reason"></textarea>
      <small class="text-danger" v-if="cause_validate">Input your message cause</small>
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
      cause_validate: false,
    };
  },

  methods: {
      addNewRequest() {
        if (this.end_date > this.start_date && this.leave_type.trim().length>0 && this.start_time.trim().length>0 && this.end_time.trim().length>0 && this.reason.trim().length>0) {
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
        } 
      },
      validation(){
        if (this.leave_type.trim().length==0){
          this.leave_type_validate = true;
        }else{
          this.leave_type_validate = false;
        }
        if (this.start_date.trim().length==0){
          this.start_date_validate = true;
        }else{
          this.start_date_validate = false;
        }
        if (this.end_date.trim().length==0){
          this.end_date_validate = true;
        }else{
          this.end_date_validate = false;
        }
        if (this.start_time.trim().length==0){
          this.start_time_validate = true;
        }else{
          this.start_time_validate = false;
        }
        if (this.end_time.trim().length==0){
          this.end_time_validate = true;
        }else{
          this.end_time_validate = false;
        }
        if (this.reason.trim().length==0){
          this.cause_validate = true;
        }else{
          this.cause_validate = false;
        }
        
      }
    },
    computed: {
      count_day() {
        let timeStart = this.start_time;
        let timeEnd = this.end_time;
        let start = moment(this.start_date);
        let end = moment(this.end_date);
        let result = 0;

        if (!isNaN(end.diff(start, "days"))) {
          if (end > start) {
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
      validate(){
        this.validation();
        
        return this.leave_type_validate,this.start_date_validate, this.end_date_validate, this.start_time_validate, this.end_time_validate, this.cause_validate;
      }
    },
  };
</script>

<style scoped>
form {
  width: 50%;
  margin: auto;
  padding: 1.5rem;
  background: #ffffff;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  border-radius: 7px;
  margin-top: 0.5rem;
  box-sizing: border-box;
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

.btn-submit {
  display: flex;
  justify-content: flex-end;
}
</style>
