<template>
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-dark form-wrapper">
      <div class="container">
        <h3 class="text-primary">Update Password</h3>
        <hr />
        <form @submit.prevent="updatePassword" class="form">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" v-model="newPassword" required minlength="8" :class="{ 'is-invalid': newPasswordError }" />
            <label for="newPassword" class="form-label">New Password</label>
            <div class="invalid-feedback">Password must be at least 8 characters.</div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" v-model="confirmPassword" required minlength="8" :class="{ 'is-invalid': confirmPasswordError }" />
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <div class="invalid-feedback">Passwords do not match.</div>
          </div>
          <p class="alert-danger" v-if="errorMessage">{{ errorMessage }}</p>

          <button type="submit" class="btn btn-primary mx-auto w-100 mb-3">Update Password</button>

          <router-link to="/" class="text-muted">Back to Login</router-link>
        </form>
      </div>
    </div>
    <Notification
      :show="successmessage !== '' || errorMessage !== ''"
      :type="successmessage !== '' ? 'success' : 'error'"
      :message="successmessage !== '' ? successmessage : errorMessage"
    ></Notification>
  </div>
</template>
  

<script>
import axios from 'axios';
import router from '@/router';
import Notification from '@/components/Notification.vue';

export default {
  components: {
    Notification,
  },
  data() {
    
    return {
      newPassword: '',
      confirmPassword: '',
      errorMessage: '',
      successmessage:'',

    };
  },
  methods: {
    updatePassword() {
      if (this.newPassword !== this.confirmPassword) {
        this.errorMessage = 'Passwords do not match';
        return;
      }

      const data = {
        email: this.$route.query.email,
        newPassword: this.newPassword,
      };

      axios
        .post('/api/update-password', data)
        .then((response) => {
          if (response.data.message === 'Password updated successfully') {
            this.$router.successfullyUpdatedPassword = true;
            router.push('/');
            this.successmessage = 'Password updated successfully';
          }
        })
        .catch((error) => {
          console.error(error);
          this.errorMessage = 'An error occurred. Please try again!';
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
