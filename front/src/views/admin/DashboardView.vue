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
            })
        },
        getAllUser(){
             axiosClient.get('admin/number_user').then(response => {
                this.amountOfusers = response.data
            })

        },
        getAllLeaves(){
             axiosClient.get('admin/number_leave').then(response => {
                this.amountOfLeaves = response.data
            })
        },
        getAmountOfAppoved(){
             axiosClient.get('admin/leaves').then(response => {
                let allleaves = response.data
                for (var i = 0; i < allleaves.length;i++){
                    if(allleaves[i].status=="Approved"){
                        this.amountOfAppoved +=1
                    }
                }
             
            })
        },
        getAmountOfRejected(){
             axiosClient.get('admin/leaves').then(response => {
                let allleaves = response.data
                for (var i = 0; i < allleaves.length;i++){
                    if(allleaves[i].status=="Rejected"){
                        this.amountOfRejected +=1
                    }
                }
            })
        }

    },
    mounted() {
        this.fetch_data()
        this.getAllUser()
        this.getAllLeaves()
        this.getAmountOfAppoved()
        this.getAmountOfRejected()
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
    background: rgba(250, 249, 249, 0.31);
}

.bg-thead{
    background: #0BAEC5;
    color:white;
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
   background: rgb(219, 216, 216);
    width: 98%;
    height: 200vh;
    margin-top: 1.3rem;
    padding: 1rem 2rem;
}
.title_continer{
    font-size: 1.2rem;
    color: rgb(48, 47, 47);

   
}

</style>