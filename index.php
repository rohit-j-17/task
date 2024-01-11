<?php include "includes/header.php"; ?>
<body>
    <div id="main-app">
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
    <?php include "includes/footer.php"; ?> 
    <script src="public/js/app.js"></script>
