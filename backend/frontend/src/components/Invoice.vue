<template>
    <div>
      <h1>Invoice</h1>
  
      <div id="invoiceContent">
        <!-- Invoice content will be dynamically generated here -->
        <h3>Products to Pay:</h3>
        <table>
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Customer Name</th>
              <th>Order Status</th>
              <th>Total Price</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in invoiceItems" :key="index">
              <td>{{ item.prod_name }}</td>
              <td>${{ Number(item.prod_price).toFixed(2) }}</td>
              <td>{{ item.name }}</td>
              <td>{{ item.order_status }}</td>
              <td>{{ item.total_price }}</td>
            </tr>
          </tbody>
        </table>
  
        <div>
          <h3>Total: ${{ calculateSubtotal() }}</h3>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        invoiceItems: [],
      };
    },
    methods: {
      calculateSubtotal() {
        return this.invoiceItems.reduce(
          (total, item) => total + Number(item.prod_price),
          0
        ).toFixed(2);
      },
      async fetchData() {
  try {
    const invoice_id = this.$route.params.invoice_id;
    const response = await axios.get(`/getInvoices/${invoice_id}`);
    this.invoiceItems = response.data;
  } catch (error) {
    console.error('Error fetching data:', error);
  }
},

    },
    mounted() {
      this.fetchData();
    },
  };
  </script>
  
  