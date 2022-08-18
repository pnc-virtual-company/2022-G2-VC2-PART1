<template>
    <div class="leave">
        <div class="row">
            <div class="col">
                <label for="status">Filter by status</label>
                <select class="form-select form-select-sm mt-2" id="status" aria-label=".form-select-sm example"
                    v-model="search">
                    <option value="show-all">Show all</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Padding">Padding</option>
                    <option value="Canceled">Canceled</option>
                </select>
            </div>
            <div class="col">
                <label for="type">Filter by leaves type</label>
                <select class="form-select form-select-sm mt-2" id="type" aria-label=".form-select-sm example"
                    v-model="search">
                    <option value="show-all">Show all</option>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Family Event">Family's Event</option>
                    <option value="Personal Event">Personal Event</option>
                </select>
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
                <tbody v-for="(leave, index) of filteredItems" :key="index">
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
                        <td>{{ leave.start_date }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: ['leaves'],
    data() {
        return {
            search: 'show-all'
        }
    },
    methods: {
    },
    computed: {
        filteredItems() {
            if (this.search == 'Approved') {
                return this.leaves.filter(leaves => leaves.status == 'Approved');
            } else if (this.search == 'Rejected') {
                return this.leaves.filter(leaves => leaves.status == 'Rejected');
            } else if (this.search == 'Canceled') {
                return this.leaves.filter(leaves => leaves.status == 'Canceled');
            } else if (this.search == 'Padding') {
                return this.leaves.filter(leaves => leaves.status == 'Padding');
            } else if (this.search == 'Sick Leave') {
                return this.leaves.filter(leaves => leaves.leave_type == 'Sick Leave');
            } else if (this.search == 'Family Event') {
                return this.leaves.filter(leaves => leaves.leave_type == 'Family Event')
            } else if (this.search == 'Personal Event') {
                return this.leaves.filter(leaves => leaves.leave_type == 'Personal Event')
            }else{
                return this.leaves
            }
        },
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