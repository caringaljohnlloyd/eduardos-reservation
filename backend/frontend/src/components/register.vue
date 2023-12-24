<template>
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 form-wrapper bg-dark shadow">
      <div class="container">
        <h3 class="text-primary text-center mb-4">Register</h3>
        <hr />

        <form @submit.prevent="register" ref="registerForm">

          <!-- Name Input with Floating Label -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" v-model="name" required placeholder=" ">
            <label for="name" class="form-label">Name</label>
          </div>

          <!-- Email Input with Floating Label -->
          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" v-model="email" required placeholder=" ">
            <label for="email" class="form-label">Email address</label>
          </div>

          <!-- Password Input with Floating Label -->
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" v-model="password" required minlength="8" placeholder=" ">
            <label for="password" class="form-label">Password</label>
          </div>

          <!-- Confirm Password Input with Floating Label -->
          <div class="form-floating mb-3">
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" required v-model="confirmpassword" @input="checkMsg" placeholder=" ">
            <label for="confirmpassword" class="form-label">Confirm Password</label>
          </div>

          <!-- Password Match Feedback -->
          <div class="alert" :class="{ 'alert-danger': !isValid || !passwordsMatch || errorMessage, 'alert-success': passwordsMatch }" v-if="showMessage">{{ errorMessage || message }}</div>

          <!-- Success Message -->
          <div class="alert alert-success" v-if="registered">Successfully registered!</div>

          <!-- Submit Button with Hover Effect -->
          <button type="submit" class="btn btn-primary mx-auto w-100 mb-3" :disabled="!passwordsMatch">Sign up</button>

          <!-- Links -->
          <div class="mt-3 text-center">
            <router-link to="/">Already have an account</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>
@import '@/assets/css/bootstrap.min.css';
@import '@/assets/css/style.css';

  .form-wrapper {
    border-radius: 10px;
    transition: box-shadow 0.3s ease-in-out;
  }

  .form-wrapper:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }


  .alert-danger {
    color: #dc3545;
    border-color: #dc3545;
    transition: opacity 0.3s ease-in-out;
  }

  .text-muted {
    color: #6c757d;
  }

 


</style>

<script>
import axios from 'axios';

export default {
  data() {
return {
  name: "",
  email: "",
  password: "",
  confirmpassword: "",
  showMessage: false,
  registered: false,
  errorMessage: "", 

};
},

  computed: {
    passwordsMatch() {
      return this.password === this.confirmpassword;
    },
    isValid() {
      return this.password !== '' && this.confirmpassword !== '';
    },
    message() {
      if (this.passwordsMatch) {
        return 'Passwords match!';
      } else {
        return 'Passwords do not match.';
        
      }
    },
    
  },
  methods: {
    checkMsg() {
      this.dirty = this.confirmpassword !== '';
      this.showMessage = this.dirty;

      if (!this.dirty) {
        this.showMessage = false;
        this.errorMessage = ''; 
      }
    },
    async register() {
      try {
        const res = await axios.post("register", {
          name: this.name,
          email: this.email,
          password: this.password,
          confirmpassword: this.confirmpassword,
        })
        this.name = "";
        this.email = "";
        this.password = "";
        this.confirmpassword = "";
        this.registered = true;
        this.showMessage = false;
        this.errorMessage = ""; 
        this.$refs.registerForm.reset();
        this.$emit('data-saved');
        this.getInfo();
        
          } catch (error) {
        if (error.response && error.response.data && error.response.data.error) {
          this.errorMessage = error.response.data.error;
          setTimeout(() => {
						this.errorMessage = "";      
					},
					4000);
          
        }
                }
              }
            }
          };
</script>