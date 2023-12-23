<!-- Notification.vue -->
<template>
  <div v-if="show" class="notification-container" :class="typeClass">
    <div class="notification-content">
      {{ message }}
    </div>
  </div>
</template>

<script>
export default {
  props: {
    show: Boolean,
    type: String,
    message: String,
  },
  computed: {
    typeClass() {
      return this.type === "success" ? "notification-success" : "notification-error";
    },
  },
};
</script>

<style scoped>
.notification-container {
  position: fixed;
  top: 20px;
  right: 20px;
  border-radius: 5px;
  z-index: 1000;
  transition: opacity 0.5s ease-in-out;
}

.notification-content {
  padding: 15px;
  border-radius: 5px;
  max-width: 300px;
  word-wrap: break-word;
}

.notification-success {
  background-color: #4caf50;
  color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.notification-error {
  background-color: #f44336;
  color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
