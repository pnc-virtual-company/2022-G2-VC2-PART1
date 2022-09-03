<template>
  <section>
    <div class="profile">
      <button @click="hideStudent">Back</button>
      <div class="card-info">
        <div class="img">
          <img :src="student.image" alt="" />
        </div>
        <div class="info">
          <ul>
            <h5>First Name: {{ student.first_name }}</h5>
            <h5>Last Name: {{ student.last_name }}</h5>
            <h5>Email : {{ student.email }}</h5>
            <h5>Telephone : {{ student.phone }}</h5>
            <h5>Batch : {{ student.batch }}</h5>
          </ul>
        </div>
      </div>
    </div>
    <div class="title">LISTOFLEAVE</div>
    <div class="listOfLeave">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">N.o</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Reason</th>
            <th scope="col">Duration</th>
            <th scope="col">Leave Types</th>
            <th scope="col">Status</th>
            <th scope="col">Request Date</th>
          </tr>
        </thead>
        <tbody v-for="(leave, index) of student.leaves" :key="index">
          <tr class="bg-white">
            <td>{{ index + 1 }}</td>
            <td>{{ leave.start_date }}</td>
            <td>{{ leave.end_date }}</td>
            <td>{{ leave.reason }}</td>
            <td>{{ leave.duration }}</td>
            <td>{{ leave.leave_type }}</td>
            <td
              v-if="leave.status == 'Rejected'"
              :class="{ rejected: leave.status == 'Rejected' }"
            >
              {{ leave.status }}
            </td>
            <td
              v-if="leave.status == 'Approved'"
              :class="{ approved: leave.status == 'Approved' }"
            >
              {{ leave.status }}
            </td>
            <td
              v-if="leave.status == 'Padding'"
              :class="{ padding: leave.status == 'Padding' }"
            >
              {{ leave.status }}
            </td>
            <td
              v-if="leave.status == 'Canceled'"
              :class="{ canceled: leave.status == 'Canceled' }"
            >
              {{ leave.status }}
            </td>
            <td>{{ leave.created_at }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</template>

<script>
export default {
  props: ["student"],
  data() {
    return {
      isDeatial: false,
    };
  },
  methods: {
    hideStudent() {
      window.location.reload();
    },
  },
};
</script>

<style scoped>
section {
  margin-top: 20px;
}
.card-info {
  display: flex;
  background: #fff;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  border-radius: 5px;
}
img {
  width: 100%;
}
.img {
  padding: 10px;
  width: 200px;
  text-align: center;
}

.listOfLeave {
  margin-top: 20px;
}
.info {
  padding: 10px;
}
li {
  list-style: none;
}

.title {
  font-size: 1.4rem;
  color: rgb(48, 47, 47);
  margin: 1rem;
}
button {
  border: none;
  color: #fff;
  background-color: #f2ae00;
  border-radius: 5px;
  padding: 5px;
  margin-bottom: 10px;
}
.approved {
  color: green;
}

.rejected {
  color: red;
}

.padding {
  color: orange;
}
table th {
  background-color: #0baec5;
  color: white;
  font-size: small;
}
</style>
>
