<template>
  
<div class="container">

    <router-link to="/addForm">
        <button class="add btn btn-warning text-white"
            type="submit">
            Add +
        </button>
    </router-link>
    <router-view/>
    
    <br>
    <div class="list">
            <div class="card-header text-center text-light header w-100 p-2 mb-2"><h2>List of Students</h2></div>
            <div class="all-card">
                <div 
                    class="each-card text-dark bg-light d-flex justify-content-between align-items-center"
                    v-for="student of students" :key="student.id"
                >
                    <div class="pro">
                        <div class="img">
                            <img src="https://a.storyblok.com/f/108104/1009x1042/59839fa38b/guide-bg.jpeg">
                        </div>
                        <div class="name"><h4>{{student.firstname}} {{student.lastname}}</h4></div>
                    </div>

                    <div class="batch">
                        <h6>{{student.batch}}</h6>
                    </div>

                    <div class="buts w-20 d-flex">
                        <router-link to="/editForm"><button class="edit p-1 m-2 rounded-2">Edit</button></router-link>
                        <router-view/>
                        <button @click="deleteStudent(student.id)" class="delete p-1 m-2 rounded-2">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "../../axios-http.js"
export default {
    data() {
        return {
            students: []
        }
    },

    methods: {
        getStudents() {
            axios.get("/students")
            .then(res=>{
                this.students = res.data;
                console.log(this.students);
            })
            .catch(err=>{
                console.log(err)
            })
        },

        deleteStudent(idDelete) {
            axios.delete("/students/"+idDelete)
            .then(res=>{
                console.log(res)
                this.getStudents()
            })
            .catch(err=>{
                console.log(err)
            })
        }
    },
   
    mounted() {
        this.getStudents()
    },
}
</script>

<style scoped>
    
    .header {
        background-color: #0BAEC5;
    }

    .edit {
        background-color: #0BAEC5;
    }

    .delete {
        background-color: rgb(240, 78, 78);
    }
    .pro {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h4, h6 {
        margin-bottom: 0;
        margin-top: 0;
    }

    .name {
        margin-left: 10px;
        display: flex;
        justify-content:center;
        align-items: center;

    }
    .each-card {
        width: 90%;
        padding: 5px;
        border-radius:8px;
        margin: 10px auto;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    img {
        width: 50px;
        height: 50px;
        border-radius:50px;
    }

    button {
        border: none;
        width: 100px;
        color: white;
    }

    button:hover {
       background-color: rgb(226, 179, 24);
       color: black;
    }
    .add {
        float: right;
        font-size: 15px;
    }

    .container {
        margin-top: 20px;
    }

    .list {
        margin-top: 30px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding-bottom: 5px;
    }

</style>