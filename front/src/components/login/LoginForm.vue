<template>
    <div class="container h-100 mt-5">
        <div class="d-flex justify-content-center h-100 mt-4">
            <div class="user_card mt-3">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container mt-3">
                        <img :src="require('@/assets/img/logo.png')" alt="logo" class="brand_logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form @submit.prevent="login">
                        <div class="input-group mb-3">
                            <strong class="header">Student Leave Management System</strong>

                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="bi bi-person-fill p-1"></i></span>
                            </div>
                            <input type="text" name="" class="form-control input_user" v-model="email" @keyup="email_validate"
                                placeholder="Email">
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="bi bi-key-fill p-1"></i></span>
                            </div>
                            <input name="password" :type="displayPass" v-model="password" class="input form-control"
                                id="password" placeholder="password" aria-label="password"
                                aria-describedby="basic-addon1" />
                            <div class="pass-act">
                                <button class="hide" v-if="isShow" @click="isShow = false">
                                    <i class="bi bi-eye p-1"></i>
                                </button>
                                <button class="show" v-else @click="isShow = true">
                                    <i class="bi bi-eye-slash p-1"></i>
                                </button>

                            </div>

                        </div>
                        <small v-if="isCorrect == false" class="text-danger">Incorrect Password or Email!</small>
                        <div class="mt-3 login_container">
                            <button type="submit" name="button" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import axios from '../../axios-http';
export default {
    data() {
        return {
            email: '',
            password: '',
            isShow: false,
            input_type: 'password',
            isCorrect: null,
        }
    },
    methods: {
        login() {
            if (this.email.trim().length>0 && this.password.trim().length>0) {
                let body = { email: this.email, password: this.password }
                if (this.email.includes('student')) {
                    axios.post('/students/logIn', body).then((response) => {
                        if (response.data.message == "success") {
                            this.$router.push("/student/leave");
                            localStorage.setItem('token', response.data.token);
                            localStorage.setItem('role', response.data.role);
                            localStorage.setItem('user_id', response.data.id);
                            this.isCorrect = true;
                            setTimeout(function () {
                                window.location.reload();
                            }, 80);
                        } else {
                            this.isCorrect = false;
                        }
                    });
                } else {
                    axios.post('/admin/logIn', body).then((response) => {
                        if (response.data.message == "success") {
                            this.$router.push("/dashboard");
                            localStorage.setItem('token', response.data.token);
                            localStorage.setItem('role', response.data.role);
                            localStorage.setItem('user_id', response.data.id);
                            this.isCorrect = true;
                            setTimeout(function () {
                                window.location.reload();
                            }, 80);
                        } else {
                            this.isCorrect = false;
                        }
                    });
                }

                this.email = '';
                this.password = '';
            } else {
                this.isCorrect = false;
            }
        },
        show_password() {
            if (this.isShow == true) {
                this.input_type = 'text';
            } else {
                this.input_type = 'password';
            }
        }
    },
    computed: {
        displayPass() {
            this.show_password();
            return this.input_type;
        },
    },
}
</script>

<style>
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css");

body,
html {
    margin: 0;
    padding: 0;
    background: rgb(211, 210, 210) !important;
}
.user_card {
    height: 400px;
    width: 35%;
    margin-top: auto;
    margin-bottom: auto;
    background: #f1f1ee;
    position: relative;
    display: flex;
    justify-content: center;
    flex-direction: column;
    padding: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 5px;

}
.header{
    color: #F2AE00;
}
.brand_logo_container {
    position: absolute;
    height: 170px;
    width: 170px;
    top: -75px;
    border-radius: 50%;
    background: rgb(211, 210, 210);
    padding: 10px;
    text-align: center;
}
form{
    width: 80%;
}
.brand_logo {
    height: 150px;
    width: 150px;
    border-radius: 50%;
    background-color: white;
    border: 3px solid #0BAEC5;

}

.pass-act button {
    border: none;
    padding: 10px 5px;
    border-radius: 0 5px 5px 0;
    background: rgb(211, 210, 210);
}

.form_container {
    margin-top: 100px;
}

.login_btn {
    width: 100%;
    background: #0BAEC5 !important;
    color: white !important;
}

.login_btn:focus {
    box-shadow: none !important;
    outline: 0px !important;
}
.login_btn:hover{
    background: #31c6da !important;
}
.login_container {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
.login_container button{
    width: 30%;
    text-align: center;
}
.input-group-text {
    background: #0BAEC5 !important;
    color: white !important;
    border: 0 !important;
    border-radius: 0.25rem 0 0 0.25rem !important;
}

.input_user,
.input:focus {
    box-shadow: none !important;
    outline: 0px !important;
}
</style>