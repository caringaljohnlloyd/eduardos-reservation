<template>
    <div>
      <form @submit.prevent="updateRecord">
        <div class="form-group">
          <label for="artist">Artist:</label>
          <input type="text" id="artist" v-model="updateInfo.artist" required>
        </div>
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" id="title" v-model="updateInfo.title" required>
        </div>
        <div class="form-group">
          <label for="releaseDate">Release Date:</label>
          <input type="date" id="releaseDate" v-model="updateInfo.release_date" required>
        </div>
        <div class="form-group">
          <label for="genre">Genre:</label>
          <input type="text" id="genre" v-model="updateInfo.genre" required>
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        updateInfo: {
          artist: '',
          title: '',
          release_date: '',
          genre: '',
        },
      };
    },
    methods: {
  async updateRecord() {
    try {
      // Make a PUT request to update the record with this.updateInfo
      const response = await axios.put(`update/${this.updateRecord.id}`, this.updateInfo);

      // Check if the update was successful (you may need to customize this based on your API response)
      if (response.status === 200) {
        // Emit an event to notify the parent component that the update is done
        this.$emit("update-done");

        // Reset the updateInfo object
        this.updateInfo = {
          artist: '',
          title: '',
          release_date: '',
          genre: '',
        };
      } else {
        // Handle the error or provide user feedback
        console.error("Update failed");
      }
    } catch (error) {
      // Handle any errors that occurred during the update process
      console.error("Update error:", error);
    }
  },
},

  };
  </script>
  