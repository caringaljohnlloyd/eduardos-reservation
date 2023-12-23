<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-3  p-4 form-wrapper bg-dark shadow">
        <h2 class="text-primary text-center mb-4">Welcome Back!</h2>

        <form @submit.prevent="login">

          <!-- Email Input -->
          <div class="form-floating mb-3">
            <input type="email" class="form-control" v-model="email" required placeholder="Email" />
            <label for="email" class="form-label">Email address</label>

          </div>

          <!-- Password Input -->
          <div class="form-floating mb-3">
            <input type="password" class="form-control" v-model="password" required minlength="8" placeholder="Password" />
            <label for="password" class="form-label">Password</label>

          </div>

          <!-- Error Message -->
          <p class="alert alert-danger text-center" v-if="errorMessage">{{ errorMessage }}</p>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary w-100 mb-3">Sign in</button>

          <!-- Links -->
          <div class="text-center">
            <router-link class="text-muted" to="/register">Don't have an account yet?</router-link>
            <span class="mx-2">|</span>
            <router-link class="text-muted" to="/reset-password">Forgot Password?</router-link>
          </div>
        </form>

      </div>
    </div>
  </div>
</template>

<style scoped>
  .form-wrapper {
    border-radius: 10px;
  }

  .form-wrapper:hover

  {
box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.text-primary {
color: #007bff;
}


.alert-danger {
color: #dc3545;
border-color: #dc3545;
}

.text-muted {
color: #6c757d;
}
</style>



<script>
import axios from 'axios';
import router from '@/router'; 
export default {
  data() {
    return {
      email: '',
      password: '',
      errorMessage: '', 

    };
  },
  methods: {
  login() {
    const data = {
      email: this.email,
      password: this.password,
    };

    axios
      .post('/login', JSON.stringify(data), {
        headers: {
          'Content-Type': 'application/json',
        },
      })
      .then((response) => {
        console.log(response.data);  

        if (response.data.message === 'Login successful') {
          sessionStorage.setItem("token", response.data.token);
          sessionStorage.setItem("id", response.data.id);

          if (response.data.role === 'admin') {
            console.log('Redirecting to admin panel');
            router.push('/admin');
          } else {
            console.log('Redirecting to user panel');
            router.push('/user');
          }
        } else {
        }
      })
      .catch((error) => {
        console.error(error);
        this.errorMessage = 'Invalid email or password, try again!';
      });
  },
},


};
</script>