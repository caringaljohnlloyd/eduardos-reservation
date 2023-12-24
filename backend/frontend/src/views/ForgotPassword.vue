<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-3 p-4 form-wrapper bg-dark shadow">
        <h3 class="text-primary text-center">Forgot Password</h3>
        <hr />
        <form @submit.prevent="resetPassword">
      
          <div class="form-floating mb-3">
            <input type="email" class="form-control" v-model="email" required placeholder="Email" />
            <label for="email" class="form-label">Email address</label>
          </div>
      
          <p class="alert-danger text-center">{{ errorMessage }}</p>
          
          <button type="submit" class="btn btn-primary w-100 mb-3">Reset Password</button>
        
          <div class="text-center">
            <router-link class="text-muted" to="/">Remembered your password? Sign in</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
  
<script>
import axios from 'axios';
import router from '@/router';

export default {
  data() {
    return {
      email: '',
      errorMessage: '',
    };
  },
  methods: {
    resetPassword() {
      const data = {
        email: this.email,
      };

      axios
        .post('/api/reset-password', data) 
        .then((response) => {
          if (response.data.message === 'Password reset successful') {
            router.push({
              path: '/update-password',
              query: { email: this.email },
            });
          }
        })
        .catch((error) => {
          console.error(error);
          if (error.response && error.response.status === 404) {
            this.errorMessage = 'Email not found. Please check and try again.';
          } else {
            this.errorMessage = 'An error occurred. Please try again!';
          }
        });
    },
  },
};
</script>
  <style scoped>
  .form-wrapper {
    border-radius: 10px;
    transition: box-shadow 0.3s ease-in-out;
  }

  .form-wrapper:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }

  .text-primary {
    color: #007bff;
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