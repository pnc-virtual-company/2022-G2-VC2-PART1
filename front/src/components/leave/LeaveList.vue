<template>
    <div class="leave">
        <div class="row">
            <div class="col">
                <label for="status">Filter by status</label>
                <select class="form-select form-select-sm mt-2" id="status" aria-label=".form-select-sm example"
                    v-model="leave_status">
                    <option value="show-all">Show all</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Padding">Padding</option>
                </select>
            </div>
            <div class="col">
                <label for="type">Filter by leaves type</label>
                <select class="form-select form-select-sm mt-2" id="type" aria-label=".form-select-sm example"
                    v-model="leave_type">
                    <option value="show-all">Show all</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Family Event">Family's Event</option>
                    <option value="Personal Event">Personal Event</option>
                </select>
            </div>
            <div class="col">
                <label for=""></label>
                <section class="btn-search">
                    <button class="btn btn-warning pt-1 pb-1 pl-2 pr-2 mt-1 text-white"
                        @click="filter_leave">Search</button>
                </section>
            </div>
        </div>

        <div class="content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Leave Types</th>
                        <th scope="col">Status</th>
                        <th scope="col">Request Date</th>
                    </tr>
                </thead>
                <tbody v-for="(leave, index) of leave_list" :key="index">
                    <tr>
                        <td>{{ leave.start_date }}</td>
                        <td>{{ leave.end_date }}</td>
                        <td>{{ leave.reason }}</td>
                        <td>{{ leave.duration }}</td>
                        <td>{{ leave.leave_type }}</td>
                        <td v-if="leave.status == 'Rejected'" :class="{ rejected: leave.status == 'Rejected' }">
                            {{ leave.status }}</td>
                        <td v-if="leave.status == 'Approved'" :class="{ approved: leave.status == 'Approved' }">
                            {{ leave.status }}</td>
                        <td v-if="leave.status == 'Padding'" :class="{ padding: leave.status == 'Padding' }">
                            {{ leave.status }}</td>
                        <td v-if="leave.status == 'Canceled'" :class="{ canceled: leave.status == 'Canceled' }">
                            {{ leave.status }}</td>
                        <td>{{ leave.created_at }}</td>
                    </tr>
                </tbody>
            </table>
            <span >No Leave for now</span>
        </div>
    </div>
</template>

<script>
import axiosClient from '../../axios-http'
export default {
    data() {
        return {
            leaves: [],
            leave_list: [],
            leave_type: 'show-all',
            leave_status: 'show-all',
        }
    },
    methods: {
        fetch_data() {
            axiosClient.get('students/leaves/').then(response => {
                this.leaves = response.data
                this.leave_list = this.leaves;
            })
        },
        filter_leave() {
            this.leave_list = this.leaves;
            if (this.leave_status != "show-all") {
                const lists = this.leaves.filter(
                    (leave_list) => leave_list.status.toLowerCase() == this.leave_status.toLocaleLowerCase()
                );
                if (this.leave_type != "show-all") {
                    this.leave_list = lists.filter(
                        (leave_list) => leave_list.leave_type.toLowerCase() == this.leave_type.toLocaleLowerCase()
                    );
                }
            } else if (this.leave_type != "show-all") {
                this.leave_list = this.leaves.filter(
                    (leave_list) => leave_list.leave_type.toLowerCase() == this.leave_type.toLocaleLowerCase()
                );
            }
            if (this.leave_type != "show-all") {
                const lists = this.leaves.filter(
                    (leave_list) => leave_list.leave_type.toLowerCase() == this.leave_type.toLocaleLowerCase()
                );
                if (this.leave_status != "show-all") {
                    this.leave_list = lists.filter(
                        (leave_list) => leave_list.status.toLowerCase() == this.leave_status.toLocaleLowerCase()
                    );
                }
            } else if (this.leave_status != "show-all") {
                this.leave_list = this.leaves.filter(
                    (leave_list) => leave_list.status.toLowerCase() == this.leave_status.toLocaleLowerCase()
                );
            }
        },
    },
    mounted() {
        this.fetch_data();
    },
}
</script>

<style scoped>
.leave {
    width: 70%;
    margin: auto;
    margin-top: 2rem;
}

.content {
    margin-top: 2rem;
}

.content table th {
    background-color: #0BAEC5;
    color: white;
    font-size: small;
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

.canceled {
    color: orangered;
}
</style>