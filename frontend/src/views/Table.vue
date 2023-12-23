<template>
  <navbar/>
  <div class="table-container">
    <table class="styled-table">
      <tr>
        <th>Artist</th>
        <th>Title</th>
        <th>Release Date</th>
        <th>Genre</th>
        <th>Action</th>
      </tr>
      <tr v-for="info in info">
        <td>{{ info.artist }}</td>
        <td>{{ info.title }}</td>
        <td>{{ info.release_date }}</td>
        <td>{{ info.genre }}</td>
          <td>
              <button @click="deleteRec(info.id)">Delete</button>
              <button @click="showUpdateForm(info)">Update</button>
          </td>
      </tr>
    </table>
  </div>
</template>

<script>
  import navbar from '@/components/navbar.vue';
import axios from 'axios';

export default {
  components: {
    navbar
  },
  data() {
return {
  info: [],
    };
  },
  created() {
    this.getInfo();
  },
  methods: {
    async deleteRec(recId) {
      const confirm = window.confirm("Do you want to DELETE this item?");
      if (confirm) {
        await axios.post("del", {
          id: recId,
        });
        this.getInfo();
      }
    },
    async getInfo() {
      try {
        const inf = await axios.get('getData');
        this.info = inf.data;
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style scoped>
.table-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.styled-table {
  background-color: #e0e0e0;
  border-collapse: collapse;
  width: 80%;
  max-width: 600px;
}

.styled-table th {
  background-color: #333;
  color: #fff;
}

.styled-table td {
  border: 1px solid #ccc;
  padding: 8px;
}
</style>

