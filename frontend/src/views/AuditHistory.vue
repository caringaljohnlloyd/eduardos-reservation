<template>
  <div class="container my-5">
    <button class="btn btn-secondary mb-3" @click="goBack" style="float: left;">Back</button>

    <h1 class="display-4 mb-4" style="font-family: 'cursive';">Audit History</h1>

    <!-- Audit Type Selector -->
    <div>
      <label for="auditType">Select Audit Type:</label>
      <select v-model="auditType" @change="fetchAuditHistory">
        <option value="all">All</option>
        <option value="inbound">Inbounds</option>
        <option value="sold">Sold</option>
      </select>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-striped custom-table">
        <!-- Table Headers -->
        <thead class="thead-dark">
          <tr>
            <th>Audit ID</th>
            <th>Shop ID</th>
            <th>Old Quantity</th>
            <th>New Quantity</th>
            <th>Type</th>
            <th>Created At</th>
          </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
          <!-- Table Rows -->
          <tr v-for="audit in auditHistory" :key="audit.audit_id">
            <td>{{ audit.audit_id }}</td>
            <td>{{ audit.shop_id }}</td>
            <td>{{ audit.old_quantity }}</td>
            <td>{{ audit.new_quantity }}</td>
            <td>{{ audit.type }}</td>
            <td>{{ formatCreatedAt(audit.created_at) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      shopId: null,
      auditType: 'all', 
      auditHistory: [],
    };
  },
  mounted() {
    this.shopId = this.$route.params.shopId;
    this.fetchAuditHistory();
  },
  methods: {
    async fetchAuditHistory() {
      try {
        const response = await axios.get(`/api/auditHistory/${this.shopId}?type=${this.auditType}`);
        this.auditHistory = response.data;
      } catch (error) {
        console.error('Error fetching audit history:', error);
      }
    },
    goBack() {
      this.$router.go(-1);
    },
    formatCreatedAt(dateTime) {
      return new Date(dateTime).toLocaleString();
    },
  },
};
</script>

<style scoped>
.custom-table {
  border-collapse: collapse;
  width: 100%;
}

.custom-table th, .custom-table td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

.custom-table th {
  background-color: #6f42c1;
  color: white;
}

.custom-table tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

.custom-table tbody tr:hover {
  background-color: #ddd;
}
.container {
  max-width: 80%;
  margin: 20px auto;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  background-color: #fff;
  padding: 20px;
}

.display-4 {
  color: #6f42c1;
}

.btn-secondary {
  background-color: #6f42c1;
  color: white;
  border-radius: 5px;
}

.table-responsive {
  overflow-x: auto;
}

.custom-table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.custom-table th, .custom-table td {
  border: 1px solid #ddd;
  padding: 12px;
  text-align: left;
}

.custom-table th {
  background-color: #6f42c1;
  color: white;
}

.custom-table tbody tr:nth-child(even) {
  background-color: #f8f9fa;
}

.custom-table tbody tr:hover {
  background-color: #e9ecef;
}

</style>
