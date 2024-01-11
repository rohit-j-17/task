<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp/Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <style>
        .form-container {
            width: 30%;
            border: 1px solid #80808040;
            border-radius: 6px;
        }
        .err-input{
            border: 1px solid red;
        }
        body {
            background-color: azure;
        }
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div id="main-app">
        <div class="container-fluid p-3 bg-primary text-white text-center">
            <h1>SignUp / Login</h1> 
        </div>
        <div class="container-fluid bg-white p-3 mt-5 text-center form-container" v-if="is_login">
            <h3>Login</h3>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" :class="[login.err.username ? 'err-input' : '']" id="email" v-model="login.username" placeholder="Username" name="email">
                <label for="email">Username</label>
            </div>
            
            <div class="form-floating mt-3 mb-3">
                <input type="password" class="form-control" :class="[login.err.password ? 'err-input' : '']" id="pwd" v-model="login.password" placeholder="Password" name="pswd">
                <label for="pwd">Password</label>
            </div>
            <a class="btn btn-success text-center" @click="loginUser">Login</a>
            <p>Don't have an account? <a href="javascript:void(0)" @click="is_login=false">Sign up</a></p>
        </div>
        <div class="container-fluid bg-white p-3 mt-5 text-center form-container" v-if="!is_login">
            <h3>Register</h3>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" :class="[register.err.first_name ? 'err-input' : '']" id="email" placeholder="Username" v-model="register.first_name" name="email">
                <label for="email">First Name</label>
            </div>

            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" :class="[register.err.last_name ? 'err-input' : '']" id="email" placeholder="Username" v-model="register.last_name" name="email">
                <label for="email">Last Name</label>
            </div>
            
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" :class="[register.err.username ? 'err-input' : '']" id="email" placeholder="Username" v-model="register.username" name="email">
                <label for="email">Username</label>
            </div>
            
            <div class="form-floating mt-3 mb-3">
                <input type="password" class="form-control" :class="[register.err.password ? 'err-input' : '']" id="pwd" placeholder="Password" v-model="register.password" name="pswd">
                <label for="pwd">Password</label>
            </div>
            <a class="btn btn-success text-center" @click="registerUser">Register</a>
            <p>Already User? <a href="javascript:void(0)" @click="is_login=true">Login</a></p>
        </div>
    </div>
    <script>
        const { createApp, ref } = Vue;

        const app = createApp({
            data() {
                return {
                    is_login: true,
                    login: {
                        username: "",
                        password: "",
                        err:{
                            username:false,
                            password:false
                        }
                    },
                    register:{
                        first_name: "",
                        last_name:"",
                        username: "",
                        password: "",
                        err:{
                            username:false,
                            password:false,
                            first_name: false,
                            last_name:false,
                        }
                    }
                };
            },
            methods: {
                checkValidation(obj){
                    let c = 0;
                    for (const k in obj) {
                        if(typeof obj[k] == "string" && obj[k].trim() == ""){
                            obj.err[k] = true;
                            return false;
                        }else{
                            obj.err[k] = false;
                        }
                        c++;
                        if(c == Object.keys(obj).length){
                            return true;
                        }
                    }
                },
                async loginUser() {
                    if(this.checkValidation(this.login)){
                        console.log(this.login);
                        try {
                            const response = await fetch("src/Controllers/Login.php", {
                            method: "POST", // or 'PUT'
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(this.login),
                            });
                            const result = await response.json();
                            console.log("Success:", result);
                            alert(result.message);
                            if(result.success){
                                localStorage.setItem('token',result.data.token);
                                window.location.href = "dashboard.php";
                            }
                            
                        } catch (error) {
                            alert("Something went wrong. Please try again after sometime");
                        }
                    }
                },
                async registerUser() {
                    if(this.checkValidation(this.register)){
                        console.log(this.register);
                        try {
                            const response = await fetch("src/Controllers/Register.php", {
                            method: "POST", // or 'PUT'
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json" 
                            },
                            body: JSON.stringify(this.register),
                            });

                            const result = await response.json();
                            console.log("Success:", result);
                            alert(result.message);
                            if(result.success){
                                this.resetForm();
                                this.is_login = true;
                            }
                        } catch (error) {
                            alert("Something went wrong. Please try again after sometime");
                        }
                    }
                },
                resetForm(){
                    this.login= {
                        username: "",
                        password: "",
                        err:{
                            username:false,
                            password:false
                        }
                    };
                    this.register={
                        first_name: "",
                        last_name:"",
                        username: "",
                        password: "",
                        err:{
                            username:false,
                            password:false,
                            first_name: false,
                            last_name:false,
                        }
                    };
                }
            }
        });

        app.mount('#main-app');
    </script>
</body>
</html>
