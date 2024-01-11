const { createApp, ref } = Vue;

const app = createApp({
  data() {
    return {
      is_login: true,
      login: {
        username: "",
        password: "",
        err: {
          username: false,
          password: false,
        },
      },
      register: {
        first_name: "",
        last_name: "",
        username: "",
        password: "",
        err: {
          username: false,
          password: false,
          first_name: false,
          last_name: false,
        },
      },
    };
  },
  mounted:()=>{
    if(localStorage.getItem('token') != null){
      window.location.href = "dashboard.php";
    }
  },
  methods: {
    checkValidation(obj) {
      let c = 0;
      for (const k in obj) {
        if (typeof obj[k] == "string" && obj[k].trim() == "") {
          obj.err[k] = true;
          return false;
        } else {
          obj.err[k] = false;
        }
        c++;
        if (c == Object.keys(obj).length) {
          return true;
        }
      }
    },
    async loginUser() {
      if (this.checkValidation(this.login)) {
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
          if (result.success) {
            localStorage.setItem("token", result.data.token);
            localStorage.setItem('user_id',result.data.user.id);
            window.location.href = "dashboard.php";
          }
        } catch (error) {
          alert("Something went wrong. Please try again after sometime");
        }
      }
    },
    async registerUser() {
      if (this.checkValidation(this.register)) {
        console.log(this.register);
        try {
          const response = await fetch("src/Controllers/Register.php", {
            method: "POST", // or 'PUT'
            headers: {
              "Content-Type": "application/json",
              Accept: "application/json",
            },
            body: JSON.stringify(this.register),
          });

          const result = await response.json();
          console.log("Success:", result);
          alert(result.message);
          if (result.success) {
            this.resetForm();
            this.is_login = true;
          }
        } catch (error) {
          alert("Something went wrong. Please try again after sometime");
        }
      }
    },
    resetForm() {
      this.login = {
        username: "",
        password: "",
        err: {
          username: false,
          password: false,
        },
      };
      this.register = {
        first_name: "",
        last_name: "",
        username: "",
        password: "",
        err: {
          username: false,
          password: false,
          first_name: false,
          last_name: false,
        },
      };
    },
  },
});

app.mount("#main-app");
