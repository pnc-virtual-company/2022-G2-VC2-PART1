<template>
    <div class="main-admin">
        <div class="title">
            Dashboard
        </div>
        <div class="allCard">
            <div class="card ">
                <div class="cardTitle allStudent">
                    All Students
                </div>
                <div class="number">{{amountOfusers}}</div>

            </div>
            <div class="card ">
                <div class="cardTitle leave">
                    Totals of Leave
                </div>
                <div class="number">{{amountOfLeaves}}</div>

            </div>
            <div class="card ">
                <div class="cardTitle apperved" >
                    Amount of approved
                </div>
                <div class="number">{{amountOfAppoved}}</div>

            </div>
            <div class="card ">
                <div class="cardTitle rejected">
                    Amount of rejected
                </div>
                <div class="number">{{amountOfRejected}}</div>

            </div>
        </div>
        <div class="container">
            <div class="title_continer">
                All Students
            </div>
            
                <table class="table">
                    <thead class="bg-thead">
                        <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">Students Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Gmail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="(user, index) in users" :key="index">
                        <th scope="row">{{index+1}}</th>
                        <td> {{user.last_name}} {{user.first_name}}</td>
                        <td>{{user.gender}}</td>
                        <td>{{user.batch}}</td>
                        <td>{{user.phone}}</td>
                        <td>{{user.email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        

</template>
<script>

import axiosClient from '../../axios-http'
export default {
    data(){
        return{
            users:[],
            amountOfusers:0,
            amountOfLeaves:0,
            amountOfAppoved:0,
            amountOfRejected:0,
        }
    },
    methods: {
        fetch_data() {
            axiosClient.get('admin/students').then(response => {
                this.users = response.data
                console.log(this.users);
            })
        },
        getAllUser(){
             axiosClient.get('admin/number_user').then(response => {
                this.amountOfusers = response.data
                console.log(this.amountOfusers);
            })

        },
        getAllLeaves(){
             axiosClient.get('admin/number_leave').then(response => {
                this.amountOfLeaves = response.data
                console.log(this.amountOfLeaves);
            })

        }

    },
    mounted() {
        this.fetch_data()
        this.getAllUser()
        this.getAllLeaves()
    }
   
}
</script>
<style scoped>
.title {
    font-size: 1.4rem;
    color: rgb(48, 47, 47);
    margin: 1rem;
}
.allCard{
    display: flex;
}
.cardTitle{
    font-size: 1.2rem;
    color: rgb(255, 240, 240);
    margin-top: -0.2rem;
    padding: 0.4rem;
    text-align: center;
  

}
.card{
    width: 24%;
    box-shadow: 0 1px 5px rgb(173, 173, 173);
    outline: none;
    border: none;
    margin: 0.5rem;
   
}
table{
    width: 100%;
    margin-top: 1rem;
}
tr{
    background: rgba(193, 192, 192, 0.31);
}

.bg-thead{
    background: rgb(71, 164, 169);
}

.number{
    font-size: 1.7rem;
    font-weight: bold;
    margin-top: -0.6rem;
    text-align: center;
    padding: 1.4rem;
}
.allStudent{
    background: #35abc5;
}
.leave{
    background: #D35784;
}
.apperved{
    background: #E9B83C;
}
.rejected{
    background: #954f9a;
}
.container{
    background: #E3DFDF;
    width: 98%;
    height: 200vh;
    margin-top: 1.3rem;
    padding: 1rem 2rem;
}
.title_continer{
    font-size: 1.2rem;
    color: rgb(48, 47, 47);

   
}
.container_card{
    background: rgb(255, 253, 253);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.3rem;
    border-radius: 7px;
    box-shadow: 0 0.2rem 0.5rem;
    margin: 1rem;
}
.infor{
    display: flex;
    align-items: center;
}
.profile img{
    width: 60px;
    height: 60px;
    border-radius:50%;
    margin-right: 1rem;
}
.all_contianer_card{
    margin-top: 1.6rem;
}
.name{
    font-weight: bold;
    font-size: 1.2rem;
}



</style>